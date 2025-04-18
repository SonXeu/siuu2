<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('applications', function (Blueprint $table) {
        $table->id();  // Tạo trường ID tự động tăng
        $table->unsignedBigInteger('user_id');  // Liên kết với người dùng (ứng viên)
        $table->unsignedBigInteger('job_id');  // Liên kết với công việc (tin tuyển dụng)
        $table->timestamps();  // Các trường created_at và updated_at tự động

        // Tạo khóa ngoại cho user_id liên kết với bảng users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        // Tạo khóa ngoại cho job_id liên kết với bảng jobs
        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
