<?php
namespace App\FacedeTest;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade{

protected static function getFacadeAccessor()
{
    return 'salam';
}

}