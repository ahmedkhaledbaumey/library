<?php



// app/Models/Book.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $gaurded =['id']; 
    protected $fillable = ['name', 'price', 'image', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
