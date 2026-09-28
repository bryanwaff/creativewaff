<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // e.g. 'development', 'production', 'design'
            $table->string('meta_catalog_id')->unique(); // e.g., CW-WEB-001
            $table->text('short_description');
            $table->longText('full_description');
            $table->decimal('price', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->string('image')->nullable();
            $table->json('features')->nullable(); // Bullet points / included items
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};