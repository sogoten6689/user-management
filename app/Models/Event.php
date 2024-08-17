<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date'];

    protected $casts = [
        'date' => 'date:Y-m-d', // Cast 'date' as a date in 'Y-m-d' format
    ];

    public function eventItems()
    {
        return $this->hasMany(EventItem::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
