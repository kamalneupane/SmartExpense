<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;


class Common extends ServiceProvider
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
        
    }
    public static function colors(){
        return[
            'blue','yellow','red','magenta','green','violet','gray','brown','purple','orange'
        ];
    } 
}
