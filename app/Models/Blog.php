<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;


    protected $fillable = ['title', 'content', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}