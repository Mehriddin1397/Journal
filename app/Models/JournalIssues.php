<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalIssues extends Model
{

    protected $table = 'journal_issue';
    protected $fillable = ['title', 'photo', 'pdf_path'];


}

