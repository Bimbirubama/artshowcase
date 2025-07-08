<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'bimbi_categories';
    protected $fillable = ['name'];

    public function artworks() {
        return $this->hasMany(Artwork::class, 'category_id');
    }
}
