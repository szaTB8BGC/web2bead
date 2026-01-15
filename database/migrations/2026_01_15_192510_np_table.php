<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('np', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nev');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('np');
    }
};