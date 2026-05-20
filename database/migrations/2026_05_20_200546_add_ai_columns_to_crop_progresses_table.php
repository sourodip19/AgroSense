<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('crop_progresses', function (Blueprint $table) {

            $table->integer('ai_health_score')->nullable();

            $table->string('ai_disease')->nullable();

            $table->text('ai_recommendation')->nullable();

            $table->string('ai_risk_level')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('crop_progresses', function (Blueprint $table) {

            $table->dropColumn([

                'ai_health_score',
                'ai_disease',
                'ai_recommendation',
                'ai_risk_level'

            ]);

        });
    }
};