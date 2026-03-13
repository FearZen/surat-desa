<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public $withinTransaction = false; // Hindari transaction abort di PGSQL

    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 50);
            $table->string('nomor_register', 50)->nullable();
            $table->foreignId('template_id')->constrained('templates')->onDelete('cascade');
            $table->foreignId('penduduk_id')->constrained('penduduks')->onDelete('cascade');
            $table->date('tanggal_surat');
            $table->text('isi_surat'); // longText -> text
            $table->string('status', 20)->default('draft'); // enum -> string
            $table->foreignId('dibuat_oleh')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};