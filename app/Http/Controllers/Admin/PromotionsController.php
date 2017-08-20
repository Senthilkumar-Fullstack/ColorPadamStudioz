<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Traits\RequestValidation;
use Illuminate\Support\Facades\Log;
use App\Repositories\PromotionsRepository;
use App\Models\Promotions;


class PromotionsController extends Controller
{
    use RequestValidation;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(PromotionsRepository $promotionsRepo, Promotions $promotions)
    {
        $this->promotionsRepo = $promotionsRepo;
        $this->promotions = $promotions;
    }

    /**
     * get promotions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $userID = $request->user()->id;

        return $this->promotionsRepo->getPromotions($userID);
    }

    
    /**
     * create promotion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return response()->json([
                    'status' => 1,
                    'message' => 'Success',
                    'data' => $request
                ]);*/
        return $this->promotionsRepo->createPromotion($request);
    }

    /**
     * get promotion by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByID($promotion_id)
    {
        return $this->promotionsRepo->getPromotionByID($promotion_id);
    }
    
    /**
     * update promotion by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateByID(Request $request, $promotion_id)
    {
        //dd($request->all());
        return $this->promotionsRepo->updatePromotionByID($request, $promotion_id);
    }

    /**
     * delete promotion by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteByID($promotion_id)
    {
        return $this->promotionsRepo->deletePromotion($promotion_id);
    }

    /**
     * get promotions without authentication
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        try {
            $data = $this->promotions->join('promotion_categories', function ($join) {
                $join->on('promotions.category_id', '=', 'promotion_categories.category_id');
            })->get(array('promotions.*', 'promotion_categories.category'));

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
                'error' => $e->errorInfo
            ], 500);
        }
    }

    /**
     * get promotions without authentication group by category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllPromotionsWithCategory()
    {
        return $this->promotionsRepo->getAllPromotionsWithCategory();
    }
}