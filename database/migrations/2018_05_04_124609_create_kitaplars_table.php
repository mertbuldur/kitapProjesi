<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitaplarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitaplars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('selflink');
            $table->integer('yazarid');
            $table->integer('yayineviid');
            $table->string('image');
            $table->double('fiyat');
            $table->text('aciklama')->nullable();
            $table->integer('kategoriid');
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
        Schema::dropIfExists('kitaplars');
    }
}
