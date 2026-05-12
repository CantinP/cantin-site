<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Stream
            ['key' => 'twitch_channel', 'value' => 'cantin',                                    'type' => 'text', 'group' => 'stream',   'label' => 'Chaîne Twitch',        'order' => 1],
            // Dons
            ['key' => 'kofi_url',       'value' => 'https://ko-fi.com/cantin',                  'type' => 'url',  'group' => 'donation', 'label' => 'Lien Ko-fi',           'order' => 1],
            ['key' => 'tipeee_url',     'value' => 'https://www.tipeeestream.com/cantin/',      'type' => 'url',  'group' => 'donation', 'label' => 'Lien Tipeeestream',    'order' => 2],
            // Mon père
            ['key' => 'pere_website_url', 'value' => 'https://web-croqueur.fr',                 'type' => 'url',  'group' => 'pere',     'label' => 'URL site du père',     'order' => 1],
            // Général
            ['key' => 'site_name',        'value' => 'Cantin',                                  'type' => 'text', 'group' => 'general',  'label' => 'Nom du site',          'order' => 1],
            ['key' => 'site_description', 'value' => 'Streamer sur Twitch',                     'type' => 'text', 'group' => 'general',  'label' => 'Description du site', 'order' => 2],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
