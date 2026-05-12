<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();     // home_intro, pere_description, donation_text…
            $table->string('title')->nullable();
            $table->longText('content')->nullable(); // HTML riche
            $table->string('image_path')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('sections'); }
};
