<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_name',
        'author',
        'first_sentence',
        'link_pdf',
        'link_content',
        'category',
        'book',
        'notes',
        'public',
    ];

    protected $casts = [
        'link_pdf' => 'array',
        'link_content' => 'array',
        'public' => 'boolean',
    ];
}
