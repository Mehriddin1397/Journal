<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['full_name'];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}

