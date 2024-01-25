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
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->string('number_of_tps');
            $table->integer('total_dpt')->default(0);
            $table->text('address')->nullable(true);
            $table->string('pic')->nullable(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('tps', function (Blueprint $table) {
            $table->foreignId('district_id')->nullable()->constrained('districts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tps', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
        });
        Schema::dropIfExists('tps');
    }
};
