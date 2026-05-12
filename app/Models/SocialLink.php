<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'platform', 'url', 'icon', 'color', 'show_in_navbar', 'show_in_footer', 'is_visible', 'order'
    ];

    protected $casts = [
        'show_in_navbar' => 'boolean',
        'show_in_footer' => 'boolean',
        'is_visible' => 'boolean',
    ];

    public function scopeVisible($q) { return $q->where('is_visible', true); }
    public function scopeOrdered($q) { return $q->orderBy('order'); }
    public function scopeNavbar($q) { return $q->where('show_in_navbar', true); }
}
