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
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();
            $table->string('titlu', 50);
            $table->text('descriere');
            $table->dateTime('data');
            $table->string('locatie', 50);
            $table->string('contact', 50);
            $table->integer('nr_max_participanti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenimente');
    }
};
