<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga', function (Blueprint $table) {
            $table->unique(['request_hash' => 1], 'request_hash');
            $table->unique(['mal_id' => 1], 'mal_id');
            $table->string('url');
            $table->string('image_url');
            $table->index('title');
            $table->index('title_english');
            $table->index('title_japanese');
            $table->enum('type', ['Manga', 'Novel', 'One-shot', 'Doujinshi', 'Manhwa', 'Manhua', 'OEL']);
            $table->integer('chapters')->index('chapters');
            $table->integer('volumes')->index('volumes');
            $table->string('status')->index();
            $table->boolean('publishing');
            $table->float('score')->index('score');
            $table->integer('rank')->index('rank')->nullable();
            $table->integer('popularity')->index('popularity');
            $table->integer('members')->index('members');
            $table->integer('favorites')->index('favorites');
            $table->string('synopsis')->nullable();
            $table->string('background')->nullable();
            $table->index('genres');
            $table->index(['published.from' => 1], 'start_date');
            $table->index(['published.to' => 1], 'end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manga');
    }
}
