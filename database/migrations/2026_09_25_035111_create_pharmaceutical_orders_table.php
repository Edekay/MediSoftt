<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pharmaceutical_orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Ej: AUD-98241
            $table->string('doctor_name');
            $table->string('medication_name');
            $table->string('dosage');
            $table->integer('quantity');
            $table->string('status'); // active, outstock, delivered, pending
            
            // Campos para la funcionalidad de Turnos y Tokens de Seguridad
            $table->string('authorization_token')->nullable(); // Hash de un solo uso
            $table->timestamp('token_expires_at')->nullable();
            $table->string('qr_code_path')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pharmaceutical_orders');
    }
};