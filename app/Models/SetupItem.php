<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetupItem extends Model
{
    protected $fillable = [
        'name', 'category', 'description', 'image_path', 'affiliate_url', 'price', 'is_visible', 'order'
    ];

    protected $casts = ['is_visible' => 'boolean', 'price' => 'float'];

    public function scopeVisible($q) { return $q->where('is_visible', true); }
    public function scopeOrdered($q) { return $q->orderBy('order'); }
}
