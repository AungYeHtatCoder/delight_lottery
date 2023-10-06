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
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->integer('ticket_no')->nullable();
            $table->float('ticket_price')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('files', 2000)->nullable();
            $table->string('files_mime')->nullable();
            $table->integer('files_size')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotteries');
    }
};