<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telepules', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nev');
            $table->integer('npid');

            $table->foreign('npid')
                  ->references('id')->on('np')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telepules');
    }
};
