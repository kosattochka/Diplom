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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias')->unique();
            $table->string('img');
            $table->text('description');
            $table->foreignId('parent_id')->nullable()->constrained('services')->cascadeOnDelete();

            $table->text('page_description');
            $table->string('page_heading')->nullable();
            $table->text('table_price')->nullable();
            $table->text('page_text')->nullable();

            $table->boolean('vis')->default(true);
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
