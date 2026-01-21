<?php

use App\Enums\ArticleStatus;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('primary_keyword');
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->text('keywords')->nullable();
            $table->text('infographic_ideas')->nullable();
            $table->string('status')->default(ArticleStatus::Draft);
            $table->timestamp('published_at')->nullable();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
