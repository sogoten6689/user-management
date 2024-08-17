<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Foreign key to events table
            $table->string('item_type'); // Type of item
            $table->foreignId('music_id')->nullable()->constrained('music')->onDelete('set null'); // Foreign key to musics table, nullable
            $table->text('note')->nullable(); // Note
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_items');
    }
};
