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
        Schema::table('boardgames', function (Blueprint $table) {
            $table->decimal('discount_rate', 5, 2)->default(0);
            $table->text('description')->nullable();
            $table->string('image_link')->nullable();
            #$table->foreignId('LearningClass_id')->nullable()->constrained('learning_classes')->onDelete('set null');
            # $table->foreignId('LearningClass_id')->constrained('learning_classes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('boardgames', function (Blueprint $table) {
            $table->dropColumn(['discount_rate', 'description', 'image_link']);
        });
    }
};
