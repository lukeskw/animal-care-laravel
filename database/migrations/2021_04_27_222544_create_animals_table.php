<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome',255)->nullable();
            $table->string('chip',255)->nullable(false);
            //$table->string('tipo',255)->nullable();
            $table->enum('tipo', ['Felino', 'Canino','Equino','Caprino','Bovino','Ave','Reptil']);
            $table->string('porte',100)->nullable();
            $table->string('raca',150)->nullable();
            $table->string('idade',10)->nullable();
            $table->date('obito_data')->nullable();
            $table->text('obito_causa')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
