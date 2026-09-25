<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // Quitamos el nullable y le asignamos la fecha actual por defecto
            $table->timestamp('email_verified_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('password');
            // Definimos un string por defecto para evitar nulos en el token
            $table->string('remember_token', 100)->default('');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            // Evitamos nulos usando la fecha actual por defecto
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            // Si el instructor exige que no haya nulos aquí tampoco, puedes asignar un valor por defecto o dejar la relación controlada
            $table->foreignId('user_id')->default(1)->index();
            $table->string('ip_address', 45)->default('0.0.0.0');
            $table->text('user_agent')->default('');
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};