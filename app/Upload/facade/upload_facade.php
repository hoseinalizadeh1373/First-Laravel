<?php
namespace App\Upload\facade;

use Illuminate\Support\Facades\Facade;

class upload_facade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'upload';    
    }
    
}