<?php

namespace App\Providers;

use App\Models\Logo;
use App\Models\Setting;
use App\Models\Ui;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $data['set'] = Setting::first();
        $data['ui'] = Ui::first();
        $data['logo'] = Logo::first();
        // $data['currency'] = Currency::whereStatus(1)->first();

        View::share($data);
    }

    protected function loadhelpers()
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
