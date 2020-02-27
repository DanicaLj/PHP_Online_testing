<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Ime cookie-ija koji ne treba da bude enkriptovan.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
