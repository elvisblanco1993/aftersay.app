<?php

use App\Models\Concern;
use App\Models\Tenant;
use App\Models\User;
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
        Schema::create('concern_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Concern::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concern_comments');
    }
};
