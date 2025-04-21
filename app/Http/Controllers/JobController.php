<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Hiển thị tất cả các tin tuyển dụng của nhà tuyển dụng.
     */
    public function index()
    {
        $jobs = Job::where('user_id', Auth::id())->get();  // Lấy tin tuyển dụng của nhà tuyển dụng hiện tại
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Hiển thị form tạo tin tuyển dụng mới.
     */
    public function create()
    {
        return view('jobs.create');  // Trả về form tạo tin tuyển dụng
    }

    /**
     * Lưu tin tuyển dụng mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        // Lưu tin tuyển dụng mới
        Job::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'user_id' => Auth::id(),  // Liên kết với người dùng (Nhà Tuyển Dụng)
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    /**
     * Hiển thị form chỉnh sửa tin tuyển dụng.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);  // Lấy tin tuyển dụng cần chỉnh sửa
        return view('jobs.edit', compact('job'));
    }

    /**
     * Cập nhật tin tuyển dụng.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Xóa tin tuyển dụng.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    /**
     * Xem chi tiết tin tuyển dụng và hồ sơ ứng viên.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
}
