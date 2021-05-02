<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cpf',14)->nullable();
            $table->string('nome',255)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('endereco',255)->nullable();
            $table->string('cnpj',18)->nullable();
            $table->string('razao_social',255)->nullable();
            $table->string('nome_fantasia',255)->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
