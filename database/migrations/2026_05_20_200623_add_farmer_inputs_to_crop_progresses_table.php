<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('crop_progresses', function (Blueprint $table) {

            $table->string('crop_condition')->nullable();

            $table->string('visible_issue')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('crop_progresses', function (Blueprint $table) {

            $table->dropColumn([

                'crop_condition',
                'visible_issue'

            ]);
        });
    }
};