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
        Schema::create('peternakan_offerings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('qty')->default(0);
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('is_visible')->default(false);
            $table->foreignId('created_by')->constrained(
                table: 'users', indexName: 'peternakan_offerings_created_by'
            );
            $table->foreignId('updated_by')->constrained(
                table: 'users', indexName: 'peternakan_offerings_updated_by'
            );
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peternakan_offerings');
    }
};
