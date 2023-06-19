<?php

namespace App\Providers;

use App\Models\contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
        if(Schema::hasTable('contacts') && contact::first()){
            View::share('contacts', contact::first());
        }else{
            View::share('contacts', (object) [
                'address' => '',
                'contact' => '',
                'Email' => '',
            ]);
        }
    }
}
