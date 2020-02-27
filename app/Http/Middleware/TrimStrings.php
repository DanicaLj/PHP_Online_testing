<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Imena atributa koja ne bi trebalo da budu trimovana.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
