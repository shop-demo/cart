<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Admin\categoryModel;
use App\Models\Admin\productsModel;
use Illuminate\Pagination\Paginator;
use App\Thuvien\CartHelper;
use App\Models\Admin\commentModel;

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
        Paginator::useBootstrap();
     
        view()->composer('*',function($view){
                $view->with([
                    'listCategory'=>categoryModel::all(),
                    'listProduct' => productsModel::all(),
                    'pages'=> categoryModel::where('id_cha',0)->get(),
                    'shopList' =>categoryModel::where('id_cha','<>','0')->get(),
                    'cartShop'=> new CartHelper()
                    

                ]);

        });
    }
}
