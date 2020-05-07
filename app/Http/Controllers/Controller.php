<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const NUM_PAGINATION = 10;

    public static function getNumPagination()
    {
        return self::NUM_PAGINATION;
    }

    protected function autorizacion($rol){
        request()->user()->autorizarRol($rol);
    }

}
