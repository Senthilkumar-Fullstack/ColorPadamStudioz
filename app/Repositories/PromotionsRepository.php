<?php

namespace App\Repositories;

use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ModelRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Promotions;

class PromotionsRepository
{

    protected $modelRepository;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(Promotions $promotion)
    {
        $this->promotion = $promotion;
    }
    
    /**
     * Get Promotions
     *
     * @param integet $userID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPromotions($userID)
    {
        try {
            $data = $this->promotion->join('promotion_categories', function ($join) {
                $join->on('promotions.category_id', '=', 'promotion_categories.category_id');
            })
            ->where('promotions.created_by', $userID)->get(array('promotions.*', 'promotion_categories.category'));

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
                'message' => 'Failed',
                'error' => $e
            ], 500);
        }
    }

    /**
     * Create Promotion
     *
     * @param string $promotion
     * @param tinyint $is_active
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPromotion($request)
    {
        DB::beginTransaction();
        try {
            $userID = $request->user()->id;
            $request->merge(['created_by' => $userID]);

            if ($request->hasFile('img')) {
                $imageName = time().'_'.rand(0,999).'.'.$request->img->getClientOriginalExtension();

                $cat_id = $request->category_id;

                #move file specified directory
                $request->img->move(storage_path('promotion_img/'.$cat_id.''), $imageName);               

                $image_path = 'promotion_img/'.$cat_id.'/'.$imageName;

                Log::info('Upload Promotion Image - promotion image moved path : '.$image_path);

                #image name include database array
                $request->merge(['promotion_img' => ''.$image_path]);
            }

            $promotion = $this->promotion->create($request->all());
            Log::info("Promotions create - ".$promotion."---".$request->hasFile('img'));
            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $promotion
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 0,
                'message' => 'Failed to create promotion',
                'error' => $e->errorInfo
            ], 500);        
        }
    }

    /**
     * Get Promotion by ID
     *
     * @param integer $promotion_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPromotionByID($promotion_id)
    {
        try {
            $data = $this->promotion
            ->where('promotion_id', $promotion_id)->get();

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
     * Update Promotion by ID
     *
     * @param string $promotion
     * @param tinyint $is_active
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePromotionByID($request, $promotion_id)
    {
        /*try {*/
            $userID = $request->user()->id;
            //dd($request->all());
            $inputData = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'promotion_order' => $request->promotion_order,
                'is_active' => $request->is_active
            ];

            if ($request->hasFile('img')) {
                $imageName = time().'_'.rand(0,999).'.'.$request->img->getClientOriginalExtension();

                $cat_id = $request->category_id;

                #move file specified directory
                $request->img->move(storage_path('promotion_img/'.$cat_id.''), $imageName);               

                $image_path = 'promotion_img/'.$cat_id.'/'.$imageName;

                /*Log::info('Upload Promotion Image - promotion image moved path : '.$image_path);*/

                #image name include database array
                //$request->merge(['promotion_img' => ''.$image_path]);

                $inputData['promotion_img'] = $image_path;
            }



            $promotion = $this->promotion->where('promotion_id', $promotion_id)->update($inputData);
            //Log::info("Promotion update - ".$inputData."---".$request->hasFile('img'));
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $promotion
            ]);
        /*} catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update promotion',
                'error' => $e->errorInfo
            ], 500);        
        }*/
    }

    /**
     * Delete Promotion
     *
     * @param integer $promotion_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePromotion($promotion_id)
    {
        DB::beginTransaction();
        try {
            $promotion = $this->promotion->where('promotion_id', $promotion_id)->delete();
            Log::info("Promotion delete - ".$promotion);
            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $promotion
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete promotion',
                'error' => $e->errorInfo
            ], 500);        
        }
    }

    /**
     * get promotions without authentication
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllPromotionsWithCategory()
    {
        try {
            $data = $this->promotion->join('promotion_categories', function ($join) {
                $join->on('promotions.category_id', '=', 'promotion_categories.category_id')->where('promotions.is_active', '=', 1);
            })->get(array('promotions.*', 'promotion_categories.category'))->groupBy('category');

            return $data;
        } catch(\Exception $e) {
            return array();
        }
    }

    /**
     * get tour packages without authentication
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllTourPackages()
    {
        try {
            $data = $this->promotion->join('promotion_categories', function ($join) {
                $join->on('promotions.category_id', '=', 'promotion_categories.category_id');
            })->get(array('promotions.*', 'promotion_categories.category'))->groupBy('category');

            return $data;
        } catch(\Exception $e) {
            return array();
        }
    }

    /**
     * get all prmotions without authentication
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllPromotions()
    {
        try {
            $data = $this->promotion->join('promotion_categories', function ($join) {
                $join->on('promotions.category_id', '=', 'promotion_categories.category_id')->where('promotions.is_active', '=', 1)->where('promotion_categories.category', 'like', '%Tour%');
            })->get();

            return $data;
        } catch(\Exception $e) {
            return array();
        }
    }

}