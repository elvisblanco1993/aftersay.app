<?php

use App\Models\Contact;
use App\Models\Tenant;
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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->cascadeOnDelete();
            $table->foreignIdFor(Contact::class)->nullable()->nullOnDelete();
            $table->string('title');
            $table->text('content');
            $table->string('author_name');
            $table->string('author_title')->nullable();
            $table->string('company')->nullable();
            $table->string('headshot_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
