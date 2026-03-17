<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            // Llaves foráneas
            $table->unsignedBigInteger('id_auto');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_empleado');
            
            $table->date('fecha_venta');
            $table->decimal('total', 10, 2);
            $table->integer('estatus')->default(1);
            $table->timestamps();

            // Definición de las relaciones
            $table->foreign('id_auto')->references('id_auto')->on('autos');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};