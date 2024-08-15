<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id(); // ID khóa chính, tự sinh
            $table->string('song_name')->nullable(false); // Tên bài hát (bắt buộc)
            $table->string('author')->nullable(true); // Tác giả
            $table->string('first_sentence')->nullable(true); // Câu đầu tiên
            $table->json('link_pdf')->nullable(true); // Link PDF (cho add nhiều link khác nhau)
            $table->json('link_content')->nullable(true); // Link content (cho add nhiều link khác nhau)
            $table->string('category')->nullable(true); // Phân loại
            $table->string('book')->nullable(true); // Sách
            $table->text('notes')->nullable(true); // Ghi chú
            $table->boolean('public')->default(false); // public (true|false)
            $table->unsignedBigInteger('group_id')->nullable(true);
            $table->foreign('group_id')->references('id')->on('groups');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps(); // created_at và updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music');
    }
}
