<?php

use App\Models\Contact;
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
        Schema::table('sequence_logs', function (Blueprint $table) {
            $table->string('token', 64)->nullable()->index()->after('id')->unique();
            $table->foreignIdFor(Contact::class)->after('sequence_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('recipient')->index()->after('action');
            $table->string('subject')->nullable()->after('recipient');
            $table->timestamp('first_opened_at')->nullable()->index();
            $table->unsignedInteger('open_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sequence_logs', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Contact::class);
            $table->dropColumn([
                'token',
                'recipient',
                'subject',
                'first_opened_at',
                'open_count',
            ]);
        });
    }
};
