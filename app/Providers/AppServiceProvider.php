<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\PopupAd;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.public', function ($view) {
            $categories = Category::query()
                ->withCount(['posts' => fn ($query) => $query->published()])
                ->orderBy('name')
                ->get();

            $activePopupAd = PopupAd::query()
                ->active()
                ->orderBy('priority')
                ->first();

            $view->with([
                'categories' => $categories,
                'activePopupAd' => $activePopupAd,
                'productStoreUrl' => 'https://lynk.id/leadersadvanced?fbclid=PAdGRleAQHQ7JleHRuA2FlbQIxMQABp5nyFS4Ywf1KZ68Y-s9nIZ-pKf1KVLC85wg_f6Dycm3U5wRrC1qU2gknDhMq_aem_Lr42ocp8gy3UaZsWMfe90Q&utm_source=ig&utm_medium=social&utm_content=link_in_bio',
            ]);
        });
    }
}
