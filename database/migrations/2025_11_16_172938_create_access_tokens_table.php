<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('access_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('token', 64);
            $table->dateTime('last_used_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->dateTime('created_at')->useCurrent();
        });

        Schema::table('access_tokens', function (Blueprint $table) {
            $table->index('token');
            $table->index('expires_at');
        });
    }

    public function down() {
        Schema::table('access_tokens', function (Blueprint $table) {
            $table->dropIndex(['token']);
            $table->dropIndex(['expires_at']);
        });

        Schema::dropIfExists('access_tokens');
    }
};
