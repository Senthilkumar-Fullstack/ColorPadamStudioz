<?php

namespace App\Repositories;

use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ModelRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\PromotionCategories;

class PromotionCategoriesRepository
{

    protected $modelRepository;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(PromotionCategories $category)
    {
        $this->category = $category;
    }
    
    /**
     * Get Categories
     *
     * @param integet $userID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories($userID)
    {
        try {
            $data = $this->category
            ->where('created_by', $userID)->get();

            if ($data->count()) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Success',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'message' => 'Success',
                    'data' => []
                ]);
            }
        } catch(\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed'
            ], 500);
        }
    }

    /**
     * Create Category
     *
     * @param string $category
     * @param tinyint $is_active
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCategory($request)
    {
        DB::beginTransaction();
        try {
            $userID = $request->user()->id;
            $request->merge(['created_by' => $userID]);
            $category = $this->category->create($request->all());
            Log::info("Categories create - ".$category);
            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $category
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 0,
                'message' => 'Failed to create category',
                'error' => $e->errorInfo
            ], 500);        
        }
    }

    /**
     * Get Category by ID
     *
     * @param integer $category_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryByID($category_id)
    {
        try {
            $data = $this->category
            ->where('category_id', $category_id)->get();

            if ($data->count()) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Success',
                    'data' => $data[0]
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'message' => 'Success',
                    'data' => []
                ]);
            }
        } catch(\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed'
            ], 500);
        }
    }

    /**
     * Update Category by ID
     *
     * @param string $category
     * @param tinyint $is_active
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCategoryByID($request, $category_id)
    {
        DB::beginTransaction();
        try {
            $userID = $request->user()->id;
            $category = $this->category->where('category_id', $category_id)->update($request->all());
            Log::info("Categories update - ".$category);
            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $category
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update category',
                'error' => $e->errorInfo
            ], 500);        
        }
    }

    /**
     * Delete Category
     *
     * @param integer $category_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCategory($category_id)
    {
        DB::beginTransaction();
        try {
            $category = $this->category->where('category_id', $category_id)->delete();
            Log::info("Categories delete - ".$category);
            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $category
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete category',
                'error' => $e->errorInfo
            ], 500);        
        }
    }

}