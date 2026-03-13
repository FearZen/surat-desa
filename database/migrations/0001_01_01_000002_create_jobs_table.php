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
        // Jobs table
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue', 191);
            $table->text('payload');
            $table->smallInteger('attempts')->unsigned();
            $table->integer('reserved_at')->nullable()->unsigned();
            $table->integer('available_at')->unsigned();
            $table->integer('created_at')->unsigned();

            $table->index(['queue', 'reserved_at', 'available_at']);
        });

        // Job batches
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id', 191)->primary();
            $table->string('name', 191);
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->text('failed_job_ids');
            $table->text('options')->nullable(); // mediumText → text
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        // Failed jobs
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 191)->unique();
            $table->text('connection');
            $table->text('queue');
            $table->text('payload'); // longText → text
            $table->text('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('jobs');
    }
};