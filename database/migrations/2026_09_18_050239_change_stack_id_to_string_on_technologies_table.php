<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            // Jika ada foreign key ke tabel stack, drop dulu (sesuaikan nama constraint jika berbeda)
            $table->dropForeign(['stack_id']);
        });

        Schema::table('technologies', function (Blueprint $table) {
            $table->string('stack_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->unsignedBigInteger('stack_id')->nullable()->change();
        });
    }
};