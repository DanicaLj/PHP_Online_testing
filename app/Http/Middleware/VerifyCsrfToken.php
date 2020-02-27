<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Oznacava koji XSRF-TOKEN cooki treba da bude setovan na response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * URIs koji treba da bude iskljucen iz CSRF verifikacije.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
