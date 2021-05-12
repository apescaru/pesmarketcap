<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoocoinRedditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poocoin_reddit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("poocoin_id");
            $table->unsignedBigInteger("reddit_id");
            $table->timestamps();

            $table->foreign("poocoin_id")->references("id")->on("poocoin");
            $table->foreign("reddit_id")->references("id")->on("reddit");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poocoin_reddit');
    }
}
