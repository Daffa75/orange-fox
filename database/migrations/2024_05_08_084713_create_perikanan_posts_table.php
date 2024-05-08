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
        Schema::create('perikanan_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('article');
            $table->foreignId('created_by')->constrained(
                table: 'users', indexName: 'perikanan_posts_created_by'
            );
            $table->foreignId('updated_by')->constrained(
                table: 'users', indexName: 'perikanan_posts_updated_by'
            );
            $table->timestamps();
            $table->dateTime('published_at')->nullable();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perikanan_posts');
    }
};
