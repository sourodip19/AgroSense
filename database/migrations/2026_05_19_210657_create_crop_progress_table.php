<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crop_progresses', function (Blueprint $table) {

            $table->id();

            $table->foreignId('field_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('growth_stage');

            $table->integer('health_percentage');

            $table->integer('progress_percentage');

            $table->float('predicted_yield');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crop_progresses');
    }
};