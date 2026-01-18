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
        Schema::table('memberships', function (Blueprint $table) {
            $table->string('card_token')->unique()->nullable()->after('rejection_reason');
            $table->timestamp('card_issued_at')->nullable()->after('card_token');
            $table->boolean('card_verified')->default(false)->after('card_issued_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropColumn(['card_token', 'card_issued_at', 'card_verified']);
        });
    }
};
