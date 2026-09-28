<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // e.g., 'Web App', 'Hybrid Event', 'Motion Design'
            $table->text('summary');
            $table->longText('description');
            $table->string('client_name')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('project_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};