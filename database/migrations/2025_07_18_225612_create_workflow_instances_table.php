<?php

use App\Models\Link;
use App\Models\Workflow;
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
        Schema::create('workflow_instances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Workflow::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Link::class)->constrained(); // Customize based on your app
            $table->integer('current_step')->default(0);
            $table->string('status')->default('running'); // Enum cast in model
            $table->timestamp('next_run_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_instances');
    }
};
