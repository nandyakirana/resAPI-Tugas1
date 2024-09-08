<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $routeMiddleware = [
        // Middleware lainnya...
        'checkLogin' => \App\Http\Middleware\CheckLogin::class,
    ];
}