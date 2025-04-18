<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kiểm tra vai trò người dùng
        if (!in_array(Auth::user()->role, $roles)) {
            // Nếu người dùng không có vai trò hợp lệ, chuyển hướng về trang lỗi hoặc trang khác
            return redirect()->route('home')->withErrors(['role' => 'You do not have permission to access this page.']);
        }

        return $next($request);
    }
}
