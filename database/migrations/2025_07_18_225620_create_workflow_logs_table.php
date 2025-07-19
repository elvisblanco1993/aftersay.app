<?php

use App\Models\WorkflowInstance;
use App\Models\WorkflowStep;
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
        Schema::create('workflow_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkflowInstance::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(WorkflowStep::class)->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->text('details')->nullable();
            $table->enum('status', ['success', 'error'])->default('success');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_logs');
    }
};
