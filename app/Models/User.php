<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Thêm fillable
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class); // Nếu User có thể tạo nhiều Company
    }
}