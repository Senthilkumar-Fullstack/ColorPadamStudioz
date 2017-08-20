<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RequestValidation;
use Illuminate\Support\Facades\Log;
use App\Repositories\PromotionCategoriesRepository;


class PromotionCategoriesController extends Controller
{
    use RequestValidation;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(PromotionCategoriesRepository $promotionCategoriesRepo)
    {
        $this->promotionCategoriesRepo = $promotionCategoriesRepo;
    }

    /**
     * get categories.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $userID = $request->user()->id;

        return $this->promotionCategoriesRepo->getCategories($userID);
    }

    
    /**
     * create category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->promotionCategoriesRepo->createCategory($request);
    }

    /**
     * get category by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByID($category_id)
    {
        return $this->promotionCategoriesRepo->getCategoryByID($category_id);
    }
    
    /**
     * update category by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateByID(Request $request, $category_id)
    {
        return $this->promotionCategoriesRepo->updateCategoryByID($request, $category_id);
    }

    /**
     * delete category by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteByID($category_id)
    {
        return $this->promotionCategoriesRepo->deleteCategory($category_id);
    }
}