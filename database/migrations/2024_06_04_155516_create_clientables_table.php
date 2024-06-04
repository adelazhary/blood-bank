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
        Schema::create('clientables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            // $table->morphs('clientable');
            $table->string('clientable_type', 255);
            $table->string('clientable_id', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientables');
    }
};