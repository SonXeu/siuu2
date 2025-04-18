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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  // Tạo trường ID tự động tăng
            $table->string('title');  // Tiêu đề công việc
            $table->text('description');  // Mô tả chi tiết công việc
            $table->string('location');  // Địa điểm công việc
            $table->unsignedBigInteger('company_id');  // Liên kết với bảng companies (công ty đăng tuyển)
            $table->timestamps();  // Các trường created_at và updated_at tự động
    
            // Tạo khóa ngoại liên kết với bảng companies
           
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
