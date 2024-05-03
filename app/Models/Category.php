<?php

// app/Models/Category.php
namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $gaurded =['id']; 

    protected $fillable = ['title'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
