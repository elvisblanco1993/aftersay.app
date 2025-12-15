<?php

use App\Models\Sequence;
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
        Schema::table('link_clicks', function (Blueprint $table) {
            $table->foreignIdFor(Sequence::class)->after('id')->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Workflow::class)->after('sequence_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('link_clicks', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Sequence::class);
            $table->dropConstrainedForeignIdFor(Workflow::class);
        });
    }
};
