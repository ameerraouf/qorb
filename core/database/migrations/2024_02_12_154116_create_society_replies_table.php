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
        Schema::create('society_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('society_id');
            $table->string('reply')->nullable();
            $table->foreign('society_id')->references('id')->on('societies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('society_replies');
    }
};
