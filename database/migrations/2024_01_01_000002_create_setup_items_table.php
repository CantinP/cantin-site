<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('setup_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('general'); // PC, Périphériques, Audio, Mobilier…
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('is_visible')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('setup_items'); }
};
