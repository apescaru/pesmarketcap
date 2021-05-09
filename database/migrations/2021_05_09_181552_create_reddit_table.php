<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reddit', function (Blueprint $table) {
            $table->id();
            $table->string("unique_id")->unique();
            $table->tinyText("url");
            $table->string("author");
            $table->string("author_id");
            $table->mediumText("title");
            $table->text("description");
            $table->text("description_html");
            $table->integer("ups");
            $table->integer("score");
            $table->float("upvote_ratio");
            $table->string("original_posted");
            $table->string("original_posted_utc");
            $table->unsignedBigInteger("source_id");
            $table->timestamps();

            $table->foreign("source_id")->references("id")->on("sources");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reddit');
    }
}
