<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\CheckUserRole;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // Các middleware khác...
        'role' => CheckUserRole::class,  // Đăng ký middleware CheckUserRole
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];
}
