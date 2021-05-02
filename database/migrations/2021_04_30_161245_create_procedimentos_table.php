<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimentos', function (Blueprint $table) {
            $table->id();
            $table->string('procedimento_nome', 255)->nullable(false);
            $table->decimal('procedimento_valor', 15,4)->nullable(false);
            $table->text('procedimento_descricao')->nullable();
            //$table->integer('produto_quantidade')->nullable();
           // $table->unsignedBigInteger('produto_id');
            $table->timestamps();

           // $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedimentos');
    }
}
