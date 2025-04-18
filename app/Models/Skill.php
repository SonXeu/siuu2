<?php

namespace App\Models;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function up()
{
    Schema::create('skills', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

}
