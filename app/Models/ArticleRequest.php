<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleRequest extends Model
{
    protected $fillable = [
        'full_name',
        'tel_number',
        'message',
        'is_read',
        'pdf_path'
    ];

}

