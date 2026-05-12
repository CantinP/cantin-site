<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['platform' => 'Twitch',       'url' => 'https://twitch.tv/cantin',                    'icon' => 'fab fa-twitch',    'color' => '#9146FF', 'order' => 1],
            ['platform' => 'Ko-fi',         'url' => 'https://ko-fi.com/cantin',                    'icon' => 'fas fa-mug-hot',   'color' => '#FF5E5B', 'order' => 2],
            ['platform' => 'Tipeeestream',  'url' => 'https://www.tipeeestream.com/cantin/',        'icon' => 'fas fa-heart',     'color' => '#f9a825', 'order' => 3],
            ['platform' => 'Discord',       'url' => 'https://discord.gg/cantin',                   'icon' => 'fab fa-discord',   'color' => '#5865F2', 'order' => 4],
            ['platform' => 'Twitter/X',     'url' => 'https://twitter.com/cantin',                  'icon' => 'fab fa-x-twitter', 'color' => '#ffffff', 'order' => 5],
            ['platform' => 'YouTube',       'url' => 'https://youtube.com/@cantin',                 'icon' => 'fab fa-youtube',   'color' => '#FF0000', 'order' => 6],
            ['platform' => 'TikTok',        'url' => 'https://tiktok.com/@cantin',                  'icon' => 'fab fa-tiktok',    'color' => '#010101', 'order' => 7],
            ['platform' => 'Instagram',     'url' => 'https://instagram.com/cantin',                'icon' => 'fab fa-instagram', 'color' => '#E1306C', 'order' => 8],
        ];
        foreach ($links as $l) {
            SocialLink::updateOrCreate(['platform' => $l['platform']], array_merge($l, [
                'show_in_navbar' => true, 'show_in_footer' => true, 'is_visible' => true,
            ]));
        }
    }
}
