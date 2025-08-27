<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $t) {
            $t->id();
            $t->foreignId('institution_id')->constrained()->cascadeOnDelete();

            // Keep lengths short enough to be indexed with utf8mb4
            $t->string('level', 50);       // e.g., Bachelor, Master, PhD
            $t->string('title', 191);
            $t->string('language', 10);    // EN, FR, AR
            $t->integer('tuition')->nullable();
            $t->string('duration', 100)->nullable();
            $t->string('slug', 191)->unique();
            $t->boolean('is_active')->default(true);
            $t->json('requirements')->nullable();

            $t->timestamps();

            // Composite index — safe now
            $t->index(['institution_id', 'level', 'language'], 'programs_institution_level_lang_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
