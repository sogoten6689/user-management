<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    protected $fillable = ['event_id', 'item_type', 'music_id', 'note'];

    // Define the event item types as constants
    const TYPE_CNL = 'CNL';
    const TYPE_DC = 'DC';
    const TYPE_AII = 'AII';
    const TYPE_CTL = 'CTL';
    const TYPE_CHL = 'CHL';
    const TYPE_KL = 'KL';
    const TYPE_NULL = '--';

    /**
     * Get the list of event item types.
     *
     * @return array
     */
    public static function getItemTypes()
    {
        return [
            self::TYPE_CNL,
            self::TYPE_DC,
            self::TYPE_AII,
            self::TYPE_CTL,
            self::TYPE_CHL,
            self::TYPE_KL,
            self::TYPE_NULL,
        ];
    }


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function music()
    {
        return $this->belongsTo(Music::class);
    }
}
