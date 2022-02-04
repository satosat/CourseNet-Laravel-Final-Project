<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // Define One-to-Many relationship with reviews, bookmarks and transactions table
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Many-to-Many relationship with Book
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_user')->withPivot('rent_date', 'return_date', 'created_at');
    }
}
