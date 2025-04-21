<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'company_id' // Liên kết với Company
    ];

    // Quan hệ với Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Quan hệ với Applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}