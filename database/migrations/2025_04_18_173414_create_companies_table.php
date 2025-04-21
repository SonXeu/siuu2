<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên công ty
            $table->text('description')->nullable(); // Mô tả
            $table->string('address'); // Địa chỉ
            $table->string('website')->nullable(); // Website
            $table->string('logo')->nullable(); // Đường dẫn logo
            // Khóa ngoại đến bảng users (1 user ~ 1 công ty)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
