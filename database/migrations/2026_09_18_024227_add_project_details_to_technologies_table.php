<?php

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
        Schema::table('technologies', function (Blueprint $table) {
            $table->text('description')->nullable()->after('icon');
            $table->string('github_link')->nullable()->after('description');
            $table->string('demo_link')->nullable()->after('github_link');
            $table->string('screenshot')->nullable()->after('demo_link');
            $table->foreignId('stack_id')->nullable()->after('screenshot')
                ->constrained('stacks')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->dropForeign(['stack_id']);
            $table->dropColumn(['description', 'github_link', 'demo_link', 'screenshot', 'stack_id']);
        });
    }
};