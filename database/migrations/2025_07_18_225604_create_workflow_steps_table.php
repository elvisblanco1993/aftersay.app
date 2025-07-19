<?php

use App\Models\Template;
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
        Schema::create('workflow_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Workflow::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('order')->default(1);
            $table->string('action'); // PHP enum validated: 'send_email' or 'send_sms', etc.
            $table->unsignedInteger('delay')->default(0);
            $table->string('delay_unit')->default('minutes'); // Validated by DelayUnit enum
            $table->foreignIdFor(Template::class)->nullable()->constrained()->nullOnDelete();
            $table->text('custom_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_steps');
    }
};
