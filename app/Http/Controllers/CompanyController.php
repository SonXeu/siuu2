<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Hiển thị form tạo công ty mới.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.create');  // Trả về form tạo công ty mới
    }

    /**
     * Lưu công ty mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Lưu công ty mới vào cơ sở dữ liệu
        Company::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'user_id' => Auth::id(),  // Liên kết công ty với người dùng (Nhà Tuyển Dụng)
        ]);

        return redirect()->route('company.show')->with('success', 'Company created successfully!');
    }

    /**
     * Hiển thị thông tin công ty của nhà tuyển dụng.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $company = Company::where('user_id', Auth::id())->first();  // Lấy thông tin công ty của nhà tuyển dụng
        return view('company.show', compact('company'));
    }

    /**
     * Hiển thị form chỉnh sửa thông tin công ty.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $company = Company::where('user_id', Auth::id())->first();  // Lấy thông tin công ty của nhà tuyển dụng
        return view('company.edit', compact('company'));
    }

    /**
     * Cập nhật thông tin công ty.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $company = Company::where('user_id', Auth::id())->first();
        $company->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('company.show')->with('success', 'Company updated successfully!');
    }
}
