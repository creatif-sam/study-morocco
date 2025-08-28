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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');                     // blog title
            $table->string('slug')->unique();            // SEO-friendly slug
            $table->text('excerpt')->nullable();         // short description
            $table->longText('content');                 // full blog content
            $table->string('cover_image')->nullable();   // featured image
            $table->foreignId('user_id')                 // author
                  ->constrained()
                  ->cascadeOnDelete();
            $table->boolean('published')->default(false); // publish status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
