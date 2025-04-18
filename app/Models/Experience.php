<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;



class Experience extends Model

{
    use HasFactory;
    public function up()
{
    Schema::create('experiences', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('company');
        $table->text('description');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

}
