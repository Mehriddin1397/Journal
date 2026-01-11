<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalIssue extends Model
{
    protected $fillable = [
        'title',
        'year',
        'issue_number',
        'published_at'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

