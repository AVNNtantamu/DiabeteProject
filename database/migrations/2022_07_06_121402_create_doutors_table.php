<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doutors', function (Blueprint $table) {
            $table->id();
            $table->string('pri_nome')->nullable();
            $table->string('ulti_nome')->nullable();
            $table->string('n_ordem')->unique()->nullable();
            $table->string('especialidade')->nullable();
            $table->integer('id_usuario')->nullable();
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
        Schema::dropIfExists('doutors');
    }
}
