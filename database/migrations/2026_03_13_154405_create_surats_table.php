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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('nomor_register')->nullable();
            $table->foreignId('template_id')->constrained('templates')->onDelete('cascade');
            $table->foreignId('penduduk_id')->constrained('penduduks')->onDelete('cascade');
            $table->date('tanggal_surat');
            $table->longText('isi_surat');
            $table->enum('status', ['draft', 'selesai', 'dicetak'])->default('draft');
            $table->foreignId('dibuat_oleh')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
