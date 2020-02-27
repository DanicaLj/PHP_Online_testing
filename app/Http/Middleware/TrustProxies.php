<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * Poverljiv proxies za ovu aplikaciju.
     *
     * @var array|string
     */
    protected $proxies;

    /**
     * Headeri koji treba da budu detektovani za ovaj proxi.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
