<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete(); // participant
            $t->foreignId('program_id')->constrained()->cascadeOnDelete();
            $t->foreignId('intake_id')->nullable()->constrained()->nullOnDelete();
            $t->foreignId('assigned_agent_id')->nullable()->constrained('users')->nullOnDelete();

            $t->string('status')->default('draft'); // draft|submitted|under_review|admitted|denied
            $t->string('decision')->nullable();     // admit|deny|conditional
            $t->timestamp('decision_at')->nullable();
            $t->string('application_no')->unique();

            $t->timestamps();

            $t->index(['user_id','status']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
