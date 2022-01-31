<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    // Define One-to-Many relationship with details table
    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    // Define Many-to-One relationship with users table
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
