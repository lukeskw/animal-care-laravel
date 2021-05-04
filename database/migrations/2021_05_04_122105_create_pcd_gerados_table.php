<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcdGeradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gera_procedimentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('procedimento_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('animal_id');
            $table->decimal('pcd_valor', 15,2)->nullable(false);

            $table->text('pcd_descricao');


            $table->foreign('procedimento_id')->references('id')->on('procedimentos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('animal_id')->references('id')->on('animals');
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
        Schema::dropIfExists('pcd_gerados');
    }
}
