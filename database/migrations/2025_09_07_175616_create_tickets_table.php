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
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('subject');
            $table->text('body');
            $table->enum('status', ['open','pending','closed'])->default('open')->index();
            $table->string('category')->nullable()->index();
            $table->boolean('manual_category')->default(false)->index();
            $table->text('note')->nullable();
            $table->text('explanation')->nullable();
            $table->decimal('confidence', 4, 3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
