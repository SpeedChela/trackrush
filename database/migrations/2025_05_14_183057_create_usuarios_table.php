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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 100);
            $table->string('Ap_pat', 100);
            $table->string('Ap_mat', 100);
            $table->string('correo', 150)->unique();
            $table->string('contraseña', 255);
            $table->foreignId('id_rol')->constrained('roles');
            $table->foreignId('id_municipio')->constrained('municipios');
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
        Schema::dropIfExists('usuarios');
    }
};
