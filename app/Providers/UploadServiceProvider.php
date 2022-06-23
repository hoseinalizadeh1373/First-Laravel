<?php

namespace App\Providers;

use App\FacedeTest\salam;
use App\Upload\upload;
use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind('upload',function(){
        //     return new upload;
        // });

        app()->bind('salam',function(){
            return new salam;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
