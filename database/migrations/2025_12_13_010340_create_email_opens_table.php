<?php

use App\Models\SequenceLog;
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
        Schema::create('email_opens', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SequenceLog::class)->constrained()->cascadeOnDelete();
            $table->string('user_agent', 500)->nullable();
            $table->string('ip_hash', 64)->nullable();
            $table->string('provider')->nullable();
            $table->timestamp('opened_at')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_opens');
    }
};
