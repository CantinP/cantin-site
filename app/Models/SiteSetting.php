<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'group', 'label', 'order'];

    /**
     * Récupère un paramètre par clé avec valeur par défaut.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return static::where('key', $key)->value('value') ?? $default;
    }
}
