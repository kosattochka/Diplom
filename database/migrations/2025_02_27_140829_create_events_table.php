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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->string('alias')->unique();
            $table->string('slogan');
            $table->text('short_description');
            $table->text('description');
            $table->text('detailed');
            $table->integer('sort') -> default(0);
            $table->integer('vis') ->default(0);

            $table->timestamp('limit_date')->nullable();
            $table->boolean('active')->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
