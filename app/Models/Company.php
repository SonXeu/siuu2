<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Định nghĩa bảng trong cơ sở dữ liệu
    protected $table = 'companies';

    // Các thuộc tính có thể được gán đại trà
    protected $fillable = [
        'name',
        'location',
        'description',
        'user_id',
    ];

    /**
     * Liên kết với bảng `users` (Nhà tuyển dụng)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
