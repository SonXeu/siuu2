<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller; 

class ProfileController extends Controller
{
    /**
     * Hiển thị thông tin tài khoản người dùng.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        // Áp dụng middleware 'auth' cho tất cả các phương thức
        $this->middleware('auth');
        // Hoặc nếu bạn muốn phân quyền bằng role middleware
        $this->middleware('role:admin,candidate,employer')->only(['show', 'update']);
    }
    public function show()
    {
        return view('profile.show');  // Hiển thị thông tin tài khoản người dùng
    }

    /**
     * Cập nhật thông tin tài khoản người dùng.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Cập nhật thông tin người dùng
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Nếu có thay đổi mật khẩu, cập nhật mật khẩu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();  // Lưu các thay đổi

        // Quay lại trang tài khoản với thông báo thành công
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
