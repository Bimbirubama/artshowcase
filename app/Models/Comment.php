<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'bimbi_comments';

    protected $fillable = ['artwork_id', 'name', 'comment'];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}

