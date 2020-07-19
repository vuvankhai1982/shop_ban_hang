<?php

namespace App\Providers;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;

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
        $data['categories'] = ProductCategory::all();
        view()->share($data);

        $data['bestsellers'] = Product::where('type_id', config('constants.product.types.ban_chay'))->get();
        view()->share($data);
    }
}
