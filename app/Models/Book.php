<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'publisher',
    ];

    // Define One-to-Many relationship with reviews, bookmarks and details table
    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'book_id');
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    // Define One-to-One relationship with bookdetails table
    public function bookdetails()
    {
        return $this->hasOne(BookDetail::class);
    }
}
