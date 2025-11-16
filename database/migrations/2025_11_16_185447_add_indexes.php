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
        Schema::table('access_tokens', function (Blueprint $table) {
            $table->index('token');
            $table->index('expires_at');
        });

        Schema::table('conversations', function (Blueprint $table) {
            $table->index(['user1_id', 'user2_id']);
            $table->index(['user2_id', 'user1_id']);
            $table->index('updated_at');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->index('conversation_id');
            $table->index('sender_id');
            $table->index('created_at');
            $table->index(['conversation_id', 'created_at']);
            $table->index(['conversation_id', 'is_read']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropIndex(['conversation_id']);
            $table->dropIndex(['sender_id']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['conversation_id', 'created_at']);
            $table->dropIndex(['conversation_id', 'is_read']);
        });

        Schema::table('conversations', function (Blueprint $table) {
            $table->dropIndex(['user1_id', 'user2_id']);
            $table->dropIndex(['user2_id', 'user1_id']);
            $table->dropIndex(['updated_at']);
        });

        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->dropIndex(['token']);
            $table->dropIndex(['expires_at']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['email']);
        });
    }
};
