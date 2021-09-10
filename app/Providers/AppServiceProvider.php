<?php

namespace App\Providers;

use View;
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

        $routes = [
            'Dashboard'=>[
                'Name'=>'Dashboard',
                'Icon'=>'dashboard.png'
            ],
            'Issues'=>[
                'Name'=>'Issues',
                'Icon'=>'screen-report.png'
            ],
            'Users'=>[
                'Name'=>'Users',
                'Icon'=>'users.png'
            ],
            'Solutions'=>[
                'Name'=>'Solutions',
                'Icon'=>'solutions.png'
            ],
            'Reports'=>[
                'Name'=>'Reports',
                'Icon'=>'stats.png'
            ],
            'Settings'=>[
                'Name'=>'Settings',
                'Icon'=>'settings.png'
            ],
        ];

        $routes = json_encode($routes);
        View::share([
            'routes'=>$routes
        ]);
    }
}
