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
        Schema::create('pumping_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();

            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->integer('duration')->nullable();

            $table->decimal('amount_left_breast', 8, 2)->nullable();
            $table->string('left_breast_unit')->nullable();
            $table->decimal('amount_right_breast', 8, 2)->nullable();
            $table->string('right_breast_unit')->nullable();

            $table->decimal('total_amount', 8, 2)->nullable();
            $table->string('total_amount_unit')->nullable();

            $table->timestamps();
 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pumping_sessions');
    }
};
