<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("last_name");
            $table->enum('id_type',['Cédula de ciudadanía','Cédula de extranjería','Pasaporte','Tarjeta de identidad']);
            $table->string("id_card");
            $table->string("phone");
            $table->string("email");
            $table->string("profession");
            $table->enum('role',['Administrador','Espectador','Ejecutor','Invitado']);
            $table->string("message")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
