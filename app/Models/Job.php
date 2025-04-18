<?php

namespace App\Models;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;



class Job extends Model
{
    public function up()
{
    Schema::create('jobs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('location');
        $table->unsignedBigInteger('company_id');
        $table->timestamps();

        $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
    });
}


}