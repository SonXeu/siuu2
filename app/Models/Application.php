<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Các thuộc tính và phương thức liên quan đến model Job
}




class Application extends Model
{
    use HasFactory;
    public function up()
{
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('job_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
    });
}

}
