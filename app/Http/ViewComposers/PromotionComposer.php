<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Repositories\PromotionsRepository;

class PromotionComposer
{
    /**
     * The promotions repository implementation.
     *
     * @var PromotionsRepository
     */
    protected $promotions;

    /**
     * Create a new promotions composer.
     *
     * @param  PromotionsRepository  $promotions
     * @return void
     */
    public function __construct(PromotionsRepository $promotions)
    {
        // Dependencies automatically resolved by service container...
        $this->promotions = $promotions;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('promotions', $this->promotions->getAllPromotionsWithCategory());
        $view->with('tourPackages', $this->promotions->getAllTourPackages());
        $view->with('allPromotions', $this->promotions->getAllPromotions());
    }
}