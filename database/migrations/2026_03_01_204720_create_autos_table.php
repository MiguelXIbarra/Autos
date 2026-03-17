<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id('id_auto');
            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');
            $table->decimal('precio', 10, 2);
            $table->integer('estatus')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};