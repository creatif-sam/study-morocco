<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('intakes', function (Blueprint $t) {
            $t->id();
            $t->foreignId('program_id')->constrained()->cascadeOnDelete();
            $t->date('start_date');
            $t->date('app_deadline')->nullable();
            $t->unsignedInteger('seats')->nullable();
            $t->timestamps();

            $t->index(['program_id','start_date']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('intakes');
    }
};
