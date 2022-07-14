<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('id_identi')->nullable();
            $table->string('id_usuario');
            $table->string('prime_nome')->nullable();
            $table->string('ulti_nome')->nullable();
            $table->string('data_nasc')->nullable();
            $table->string('endereco')->nullable();
            $table->integer('nivel_diabete')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
