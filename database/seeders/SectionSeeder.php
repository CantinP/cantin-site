<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['slug' => 'home_intro',        'title' => 'Bienvenue',       'content' => 'Salut ! Je suis Cantin, streamer passionné sur Twitch. Rejoins le live !',  'order' => 1],
            ['slug' => 'pere_description',  'title' => 'Mon Père',        'content' => 'Mon père Philippe tient le site Web Croqueur, dédié au patrimoine du Nivernais.', 'order' => 1],
            ['slug' => 'donation_text',     'title' => 'Soutiens-moi !',  'content' => 'Si tu apprécies mon contenu, tu peux me soutenir via Ko-fi ou Tipeee. Merci !', 'order' => 1],
        ];
        foreach ($sections as $s) {
            Section::updateOrCreate(['slug' => $s['slug']], array_merge($s, ['is_visible' => true]));
        }
    }
}
