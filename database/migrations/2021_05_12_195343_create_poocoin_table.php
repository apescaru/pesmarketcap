<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoocoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poocoin', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("last_seen")->nullable();
            $table->float("price")->nullable();
            $table->string("website")->nullable();
            $table->boolean("scam")->default(false);
            $table->boolean("active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poocoin');
    }
}