<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public $withinTransaction = false; // Hindari abort transaction di PGSQL

    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20)->unique(); // panjang ditentukan
            $table->string('nama', 191);
            $table->string('tempat_lahir', 191);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 20); // string instead of enum
            $table->text('alamat');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('pekerjaan', 100);
            $table->string('agama', 50);
            $table->string('status_perkawinan', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};