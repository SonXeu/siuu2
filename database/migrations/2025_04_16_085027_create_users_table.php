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
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Tạo trường ID tự động tăng
            $table->string('name');  // Tên người dùng
            $table->string('email')->unique();  // Email người dùng, cần phải duy nhất
            $table->string('password');  // Mật khẩu
            $table->enum('role', ['candidate', 'employer', 'admin'])->default('candidate');  // Vai trò người dùng
            $table->rememberToken();  // Token nhớ người dùng (cho chức năng "remember me")
            $table->timestamps();  // Các trường created_at và updated_at tự động
    
            // Có thể thêm các chỉ mục hoặc khóa ngoại nếu cần thiết
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
