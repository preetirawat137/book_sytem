<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=['review','rating','user_id','book_id'];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
