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
        Schema::create('incidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('neighbor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('type_incidence_id')->nullable()->constrained()->nullOnDelete();
            $table->string('description');
            $table->string('location');
            $table->enum('status', ['pendiente', 'en revision', 'en proceso', 'resuelta', 'cerrada'])->default('pendiente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidences');
    }
};
