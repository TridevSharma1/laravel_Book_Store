<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'quantity',
        'book_image',
        'description',
    ];

    // Relationship: A book can be issued many times
    public function issues()
    {
        return $this->hasMany(BookIssue::class);
    }
}
