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
    Schema::create('experiences', function (Blueprint $table) {
        $table->id();  // Tạo trường ID tự động tăng
        $table->string('title');  // Tên công việc
        $table->string('company');  // Tên công ty
        $table->text('description');  // Mô tả công việc
        $table->unsignedBigInteger('user_id');  // Liên kết với bảng users (mỗi kinh nghiệm thuộc về một người dùng)
        $table->timestamps();  // Các trường thời gian (created_at, updated_at)

        // Tạo khóa ngoại liên kết với bảng users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
