<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $table = 'bimbi_creators';
    
    protected $fillable = ['name', 'email', 'bio'];
    
    public function artworks() {
        return $this->hasMany(Artwork::class, 'creator_id');
    }
}
