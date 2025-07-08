<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
     protected $table = 'bimbi_artworks';
    protected $fillable = ['title', 'description', 'image', 'creator_id', 'category_id'];

    public function creator() {
        return $this->belongsTo(Creator::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'artwork_id');
    }
}
