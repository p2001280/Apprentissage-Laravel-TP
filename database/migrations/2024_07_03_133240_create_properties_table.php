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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $string->longText('description');
            $string->integer('surface');
            $string->integer('rooms');
            $string->integer('bedrooms');
            $string->integer('floor');
            $string->integer('price');
            $string->string('city');
            $string->string('address');
            $string->string('postal_code');
            $string->string('sold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
