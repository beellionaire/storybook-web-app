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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->integer('chapter_number');

            $table->string('title'); // Contoh: "Untitled Part 1"
            $table->string('visual_image')->nullable(); // <-- INI UNTUK GAMBAR HEADER (Anak naik buku)
            $table->longText('content'); // Isi tulisan dari WYSIWYG Editor

            // Fitur "Add a poll" yang terlihat di gambar
            $table->boolean('has_poll')->default(false);
            $table->json('poll_data')->nullable(); // Menyimpan data pertanyaan & opsi polling

            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
