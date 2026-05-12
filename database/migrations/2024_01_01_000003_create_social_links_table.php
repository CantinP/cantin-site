<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform');     // Twitch, Discord, YouTube, Twitter/X, TikTok…
            $table->string('url');
            $table->string('icon')->nullable();  // classe icon (Font Awesome)
            $table->string('color')->nullable(); // hex
            $table->boolean('show_in_navbar')->default(true);
            $table->boolean('show_in_footer')->default(true);
            $table->boolean('is_visible')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('social_links'); }
};
