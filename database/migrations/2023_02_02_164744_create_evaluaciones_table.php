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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->string('evaluacion')->notNull();
            $table->integer('porcentaje')->notNull();
            $table->unsignedBigInteger('id_materia_curso');
            $table->string('created_by', 25)->notNull();
            $table->string('modified_by', 25);
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            $table->foreign('id_materia_curso')->references('id')->on('materias__cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
};
