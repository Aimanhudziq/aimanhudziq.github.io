<?php

namespace App\Providers;

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
        \Response::macro('attachment', function ($content) {

            $headers = [
                'Content-type'        => 'text/xml',
                'Content-Disposition' => 'attachment; filename="report_asscc.xml"',
            ];
        
            return \Response::make($content, 200, $headers);
        
        });
    }
}
