<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ut', function (Blueprint $table) {
            $table->increments('azon');
            $table->string('nev');
            $table->decimal('hossz', 5, 2);
            $table->integer('allomas');
            $table->decimal('ido', 4, 2);
            $table->boolean('vezetes');
            $table->integer('telepulesid');

            $table->foreign('telepulesid')
                  ->references('id')->on('telepules')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ut');
    }
};