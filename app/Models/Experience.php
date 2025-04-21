<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'user_id' // Liên kết với User
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}