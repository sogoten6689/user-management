<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{

    use SoftDeletes;
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
        'created_by',
    ];

    protected $casts = [
        'link_pdf' => 'array',
        'link_content' => 'array',
        'public' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
