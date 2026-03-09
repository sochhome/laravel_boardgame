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
        Schema::create('learning_classes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('instructor');
            $table->text('description');
            $table->string('location');
            $table->dateTime('start_time');
            $table->dateTime('duration');
            $table->decimal('hourly_price', 8, 2);
            $table->foreignId('Boardgame_id')->nullable()->constrained('boardgames')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_classes');
    }
};
