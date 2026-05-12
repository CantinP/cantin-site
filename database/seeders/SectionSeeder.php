<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'slug'    => 'home_intro',
                'title'   => 'Bienvenue',
                'content' => 'Salut ! Je suis Cantin, streamer passionné sur Twitch depuis 2011. Rejoins le live !',
                'order'   => 1,
            ],
            [
                'slug'    => 'about',
                'title'   => 'Qui suis-je ?',
                'content' => "Enchanté, moi c'est Cantin, 28 ans.\nFier Nivernais depuis la naissance (LA BOURGOGNE LIBRE !).\nJe stream depuis.. 14 ans.\nOuais je sais, je ne suis personne pourtant dans le stream game, mais j'ai fait mes premier stream en Novembre 2011.\nQue ce soit Dailymotion, Hitbox, Youtube, Kick, JustinTV ou Twitch, j'ai testé des tonnes de plateformes, et je me suis enfin posé sur Twitch \"définitivement\" depuis 2016.\nEn espérant que mon contenu va vous plaire et qu'on pourra bien s'entendre.\nÀ bientôt !",
                'order'   => 2,
            ],
            [
                'slug'    => 'pere_description',
                'title'   => 'Mon Père',
                'content' => 'Mon père Philippe tient le site Web Croqueur, dédié au patrimoine du Nivernais en Bourgogne.',
                'order'   => 1,
            ],
            [
                'slug'    => 'donation_text',
                'title'   => 'Soutiens-moi !',
                'content' => 'Si tu apprécies mon contenu, tu peux me soutenir via Ko-fi ou Tipeeestream. Même un petit don compte énormément. Merci !',
                'order'   => 1,
            ],
        ];
        foreach ($sections as $s) {
            Section::updateOrCreate(['slug' => $s['slug']], array_merge($s, ['is_visible' => true]));
        }
    }
}
