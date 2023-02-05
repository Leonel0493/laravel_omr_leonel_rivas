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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50)->notNull();
            $table->string('apellidos', 50)->notNull();
            $table->unsignedBigInteger('id_pais');
            $table->string('created_by', 25)->notNull();
            $table->string('modified_by', 25);
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            $table->foreign('id_pais')->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
