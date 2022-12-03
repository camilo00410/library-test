<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    const AVAILABLE = 1;
    const UNAVAILABLE = 0;

    protected $fillable = ['status'];

    protected function isbn(): Attribute
    {
        return new Attribute(
            // get: fn($value) => ucwords($value),
            // set: fn($value) => str_replace('-', ' ',$value)
        );
    }

    public function comments()
    {
        return $this->hasMany(BookComment::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query
        ->where('id', 'LIKE', '%'.$search.'%')
        ->orwhere('title', 'LIKE', '%'.$search.'%')
        ->orwhere('author', 'LIKE', '%'.$search.'%')
        ->orwhere('editorial', 'LIKE', '%'.$search.'%')
        ->orwhere('publication_place', 'LIKE', '%'.$search.'%')
        ->orwhere('language', 'LIKE', '%'.$search.'%');
    }
}
