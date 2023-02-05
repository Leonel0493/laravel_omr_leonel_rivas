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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->decimal('calificacion', 15,2)->notNull();
            $table->unsignedBigInteger('id_evaluacion');
            $table->unsignedBigInteger('id_alumno');
            $table->string('created_by', 25)->notNull();
            $table->string('modified_by', 25);
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            $table->foreign('id_evaluacion')->references('id')->on('evaluaciones');
            $table->foreign('id_alumno')->references('id')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
};
