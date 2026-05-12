<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'twitch_channel',      'value' => 'cantin',                                'type' => 'text', 'group' => 'stream',   'label' => 'Chaîne Twitch',              'order' => 1],
            ['key' => 'youtube_channel_url',  'value' => 'https://youtube.com/@cantin',           'type' => 'url',  'group' => 'stream',   'label' => 'URL chaîne YouTube',          'order' => 2],
            ['key' => 'youtube_channel_id',   'value' => 'UCDA_oOlXfQi2yvJXXX8rv2Q',             'type' => 'text', 'group' => 'stream',   'label' => 'ID chaîne YouTube (Cantin)',  'order' => 3],
            ['key' => 'youtube_vod_channel_id','value' => 'UC_73xmrRScNuz9eFO8B81hA',            'type' => 'text', 'group' => 'stream',   'label' => 'ID chaîne YouTube VOD',        'order' => 4],
            ['key' => 'youtube_api_key',      'value' => 'AIzaSyCuV-_dYA277g0tjsdHHht4drk21j8OkOw', 'type' => 'text', 'group' => 'stream', 'label' => 'Clé API YouTube Data v3',  'order' => 5],
            ['key' => 'kofi_url',             'value' => 'https://ko-fi.com/cantin',              'type' => 'url',  'group' => 'donation', 'label' => 'Lien Ko-fi',                  'order' => 1],
            ['key' => 'tipeee_url',           'value' => 'https://www.tipeeestream.com/cantin/',  'type' => 'url',  'group' => 'donation', 'label' => 'Lien Tipeeestream',            'order' => 2],
            ['key' => 'pere_website_url',     'value' => 'https://web-croqueur.fr',               'type' => 'url',  'group' => 'pere',     'label' => 'URL site du père',             'order' => 1],
            ['key' => 'site_name',            'value' => 'Cantin',                                'type' => 'text', 'group' => 'general',  'label' => 'Nom du site',                  'order' => 1],
            ['key' => 'site_description',     'value' => 'Streamer Twitch depuis 2011',           'type' => 'text', 'group' => 'general',  'label' => 'Description du site',          'order' => 2],
        ];
        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
