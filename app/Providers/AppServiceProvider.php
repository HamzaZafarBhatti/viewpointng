<?php

namespace App\Providers;

use App\Models\AffliateProfit;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Setting;
use App\Models\Ui;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                $extraction = AffliateProfit::whereUserId(auth()->user()->id)->where('status', 0)->latest('id')->first();
                if ($extraction) {
                    $end_date = Carbon::parse($extraction->end_datetime)->format("Y-m-d H:i:s");
                    Log::info($end_date);
                    if (Carbon::now() > $end_date) {
                        Log::info('end');
                        $extraction->update(['status' => 1]);
                        if ($extraction->status == 1) {
                            // Log::info('if2');
                            $user->update(['balance' => $user->balance + $extraction->profit]);
                            $extraction->update(['status' => 2]);
                        }
                    }
                }

                // $notifications = Notification::whereIsRead(0)->where('user_id', auth()->user()->id)->latest()->limit(7)->get();
                // $all_notifications = Notification::whereIsRead(0)->where('user_id', auth()->user()->id)->latest()->get();
                // $view->with('notifications', $notifications);
                // $view->with('all_notifications', $all_notifications);
                $view->with('user_proof', Auth::user()->show_popup);
                $view->with('user', Auth::user());
            }
        });
        $data['set'] = Setting::first();
        $data['ui'] = Ui::first();
        $data['logo'] = Logo::first();
        $data['trending'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
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
