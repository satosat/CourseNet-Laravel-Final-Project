<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'genre',
        'year_published',
        'page_length',
        'rent_price',
        'buy_price',
        'rent_stock',
        'buy_stock',
    ];

    // Define One-to-One relationship with books table
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
