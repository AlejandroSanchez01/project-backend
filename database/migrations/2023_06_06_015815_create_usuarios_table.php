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
            $table->enum('id_type',['cedula de ciudadania','cedula de extranjeria','Pasaporte','Registro','Tarjeta de identidad']);
            $table->integer("id_card");
            $table->integer("phone");
            $table->string("email");
            $table->string("profession");
            $table->enum('role',['admin','viewer','executor','guest']);
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
