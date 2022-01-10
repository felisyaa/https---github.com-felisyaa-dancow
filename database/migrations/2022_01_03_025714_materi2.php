<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materi2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi2s', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->nullable();
            $table->string('soal');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('benar');
            $table->string('image');
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
        Schema::dropIfExists('materi2');
    }
}
