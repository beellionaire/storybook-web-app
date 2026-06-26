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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description'); // Menggantikan synopsis
            $table->string('cover_image')->nullable(); // Gambar cover kiri atas

            // Metadata dari form gambar
            $table->string('language')->default('Indonesian');
            $table->enum('story_type', ['Fiction', 'Fanfic', 'Nonfiction', 'Poetry'])->default('Fiction');
            $table->string('copyright')->default('All Rights Reserved');
            $table->boolean('is_mature')->default(false); // Toggle Rating: Mature
            $table->string('target_audience')->nullable(); // Dropdown audiens

            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
