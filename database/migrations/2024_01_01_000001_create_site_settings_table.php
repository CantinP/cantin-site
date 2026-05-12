<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();          // ex: twitch_channel, kofi_url, tipeee_url
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text | image | html | boolean | url
            $table->string('group')->default('general'); // general | stream | donation | pere
            $table->string('label');                  // label lisible dans l'admin
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('site_settings'); }
};
