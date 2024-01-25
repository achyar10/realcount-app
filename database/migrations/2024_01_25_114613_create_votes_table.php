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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total')->default(0);
            $table->timestamps();
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tps_id')->nullable()->constrained('tps')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['tps_id']);
        });
        Schema::dropIfExists('votes');
    }
};
