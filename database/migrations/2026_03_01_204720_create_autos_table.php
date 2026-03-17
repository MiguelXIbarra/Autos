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
        Schema::create('autos', function (Blueprint $table) {
         $table->id('id_auto');
         $table->string('modelo');
         $table->integer('anio');
         $table->string('color');
         $table->decimal('precio', 12, 2);
         $table->string('tipo_motor');
         $table->integer('stock');
         $table->integer('status')->default(1);
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
