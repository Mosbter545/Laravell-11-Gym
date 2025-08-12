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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        $table->string('apellido');
        $table->integer('edad');
        $table->string('telefono');
        $table->float('peso');
        $table->float('altura');
        $table->string('email');
        $table->string('tipodeplan');
        $table->string('frecuenciadepago');
        $table->string('objetivo');
        $table->string('entrenador')->nullable();
        $table->string('nutricionista')->nullable();
        $table->text('descripcion')->nullable();
        $table->date('fecha_pago')->nullable();
        });  
        
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
