<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('article_old', function (Blueprint $table) {
            $table->dropColumn([
                'wp_id',
                'featured_image_url',
                'wp_author_id',
                'author_name',
                'link',
                'format',
                'categories',
                'tags',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('article_old', function (Blueprint $table) {
            $table->unsignedBigInteger('wp_id')->unique()->comment('WordPress post ID')->after('id');
            $table->string('featured_image_url')->nullable()->comment('Jetpack featured media URL')->after('excerpt');
            $table->unsignedBigInteger('wp_author_id')->nullable()->comment('WordPress author ID')->after('featured_image_url');
            $table->string('author_name')->nullable()->comment('WordPress author display name')->after('wp_author_id');
            $table->string('link')->nullable()->comment('Original WordPress post URL')->after('author_name');
            $table->string('format')->default('standard')->comment('Post format')->after('status');
            $table->json('categories')->nullable()->comment('WordPress category IDs array')->after('format');
            $table->json('tags')->nullable()->comment('WordPress tag IDs array')->after('categories');
        });
    }
};
