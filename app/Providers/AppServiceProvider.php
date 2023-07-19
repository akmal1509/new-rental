<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Setting;
use App\Models\CustomLog;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        // $logShare = 
        Paginator::useBootstrap();
        View::share('imageStorage', '/vendor/ckfinder/userfiles');
        View::share('icon', Setting::all()->first()->icon);
        View::share('settingShare', Setting::all()->first());
        // View::share('logShare', $logShare);
        config(['app.locale' => 'en']);
        Carbon::setLocale('en');
        date_default_timezone_set('australia/sydney');
    }
}
