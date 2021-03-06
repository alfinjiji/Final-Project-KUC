<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Cart; 
use Illuminate\Support\ServiceProvider;
use Illuminates\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // every single view
        
        //$count=Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
       
        view()->share('layout_categories', Category::orderBy('category_name')->get());
        view()->share('layout_count', 0);
    }
}
