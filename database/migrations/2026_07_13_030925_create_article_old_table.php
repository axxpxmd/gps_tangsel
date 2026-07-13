<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_old', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wp_id')->unique()->comment('WordPress post ID');
            $table->string('title')->comment('WordPress post title rendered');
            $table->string('slug')->unique();
            $table->longText('content')->comment('WordPress post content rendered');
            $table->text('excerpt')->nullable()->comment('WordPress post excerpt rendered');
            $table->string('featured_image_url')->nullable()->comment('Jetpack featured media URL');
            $table->unsignedBigInteger('wp_author_id')->nullable()->comment('WordPress author ID');
            $table->string('author_name')->nullable()->comment('WordPress author display name');
            $table->string('link')->nullable()->comment('Original WordPress post URL');
            $table->string('status')->default('publish')->comment('publish, draft, etc.');
            $table->string('format')->default('standard')->comment('Post format');
            $table->json('categories')->nullable()->comment('WordPress category IDs array');
            $table->json('tags')->nullable()->comment('WordPress tag IDs array');
            $table->timestamp('wp_created_at')->nullable()->comment('WordPress post date');
            $table->timestamp('wp_modified_at')->nullable()->comment('WordPress post modified date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_old');
    }
};
