<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\EventItem;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Event::create([
            'name' => 'Christmas Concert',
            'date' => '2024-12-25',
            'created_by' => 1,
        ]);

        Event::create([
            'name' => 'Easter Vigil',
            'date' => '2024-03-30',
            'created_by' => 1,
        ]);


        // Assume the event IDs are 1 and 2 based on the EventSeeder
        EventItem::create([
            'event_id' => 1, // Christmas Concert
            'item_type' => 'Music',
            'music_id' => 1, // Assuming a music record with id 1 exists
            'note' => 'Opening hymn',
        ]);

        EventItem::create([
            'event_id' => 1, // Christmas Concert
            'item_type' => 'Speech',
            'music_id' => 1, // Assuming a music record with id 1 exists
            'note' => 'Welcome speech by the choir director',
        ]);

        EventItem::create([
            'event_id' => 2, // Easter Vigil
            'item_type' => 'Music',
            'music_id' => 1, // Assuming a music record with id 2 exists
            'note' => 'Responsorial Psalm',
        ]);

        EventItem::create([
            'event_id' => 2, // Easter Vigil
            'item_type' => 'Reading',
            'music_id' => 1, // Assuming a music record with id 1 exists
            'note' => 'First Reading',
        ]);
    }
}
