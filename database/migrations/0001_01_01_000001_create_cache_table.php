<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    // Hindari abort transaction di PostgreSQL
    public $withinTransaction = false;

    public function up(): void
    {
        // Cache table
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 191)->primary(); // panjang ditentukan
            $table->text('value'); // mediumText -> text di PGSQL
            $table->integer('expiration')->index();
        });

        // Cache locks
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 191)->primary(); // panjang ditentukan
            $table->string('owner', 255);
            $table->integer('expiration')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
    }
};