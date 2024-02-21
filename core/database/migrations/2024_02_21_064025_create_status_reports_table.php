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
        Schema::create('status_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('children_id');
            $table->string('companion');
            $table->string('status_type');
            $table->text('strength_weakness');
            $table->text('reinforcers');
            $table->text('status_target');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_reports');
    }
};
