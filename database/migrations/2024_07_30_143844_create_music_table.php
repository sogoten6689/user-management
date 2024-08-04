<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\PermissionRegistrar;

class CreateMusicTable extends Migration
{
   
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('version')->nullable();
            $table->string('music_path');
            $table->string('doc_path')->nullable();
            $table->integer('is_publish')->default(1);
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('create_by');
            $table->foreign('create_by')->references('id')->on('users');
            $table->unsignedBigInteger('accepted_by')->nullable();
            $table->foreign('accepted_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musics');
    }
}
