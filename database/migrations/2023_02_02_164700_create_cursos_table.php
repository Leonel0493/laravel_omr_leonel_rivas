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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grado_academico');
            $table->string('seccion', 3);
            $table->integer('anio')->notNull();
            $table->string('created_by', 25)->notNull();
            $table->string('modified_by', 25);
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            $table->foreign('id_grado_academico')->references('id')->on('grados__academicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
