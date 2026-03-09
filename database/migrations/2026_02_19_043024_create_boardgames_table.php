<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('boardgames', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->decimal('price', 8, 2);

        // New fields
        $table->date('publish_date')->nullable();
        $table->string('url')->nullable();
        $table->string('status')->default('active');
        $table->boolean('availabilityYN')->default(true);
        $table->integer('inventoryCount')->default(0);
        $table->string('AgeRange')->nullable();
        $table->string('NoOfPlayers')->nullable();
        $table->string('Theme')->nullable();
        $table->string('Language')->default('English');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boardgames');
    }
};
