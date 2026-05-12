<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'image_path', 'is_visible', 'order'];

    protected $casts = ['is_visible' => 'boolean'];

    public static function getBySlug(string $slug): ?static
    {
        return static::where('slug', $slug)->where('is_visible', true)->first();
    }
}
