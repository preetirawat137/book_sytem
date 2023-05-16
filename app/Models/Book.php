<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;
    protected $fillable=['bname','description'];

    public function authors()
    {
        return $this->belongsToMany(Author::class,'author_book', 'book_id','author_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function genre()
    {
        return $this->hasMany(Genre::class,'book_id','id');
    }
    public function Category()
    {
        return $this->hasMany(Category::class,'book_id','id');
    }
}
