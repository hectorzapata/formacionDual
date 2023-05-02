<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('nombre');
            $table->string('paterno', 255);
            $table->string('materno', 255);
            $table->string('curp', 18)->nullable();
            $table->string('telefono', 255)->nullable();
            $table->tinyInteger('activo')->nullable()->default(1);
            $table->timestamps();
        });
        Schema::create('profesor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('nombre');
            $table->string('paterno', 255);
            $table->string('materno', 255);
            $table->string('telefono', 255)->nullable();
            $table->longText('titulo')->nullable();
            $table->tinyInteger('activo')->nullable()->default(1);
            $table->timestamps();
        });
        Schema::create('materia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('nombre');
            $table->integer('profesor_id');
            $table->tinyInteger('activo')->nullable()->default(1);
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
        Schema::dropIfExists('alumno');
        Schema::dropIfExists('profesor');
        Schema::dropIfExists('materia');
    }
};
