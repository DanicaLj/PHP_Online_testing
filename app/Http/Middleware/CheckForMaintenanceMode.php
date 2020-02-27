<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * URIs koji treba da bude dostupan dok je mod za odravanje osposobljen.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
