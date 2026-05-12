<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SetupItem;

class SetupSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // PC
            ['name' => 'AMD Ryzen 5 7600',               'category' => 'PC',            'description' => '6 coeurs / 12 threads - jusqu\'a 5.1 GHz. Socket AM5, architecture Zen 4.',         'image_path' => 'https://sm.pcmag.com/pcmag_me/cover/a/amd-ryzen-/amd-ryzen-5-7600_5ryy.jpg',                                                                                    'order' => 1],
            ['name' => 'AMD Radeon RX 6600',              'category' => 'PC',            'description' => '8 Go GDDR6 - parfaite pour le gaming 1080p et le streaming.',                        'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/484e748e91e2f6a0fff83a64563dab183b99e188.jpg',                                                 'order' => 2],
            ['name' => 'MSI PRO B850-P WIFI',             'category' => 'PC',            'description' => 'Carte mere AM5 avec WiFi integre et support DDR5.',                                  'image_path' => null,                                                                                                                                                              'order' => 3],
            ['name' => 'Corsair Vengeance RGB DDR5 32 Go','category' => 'PC',            'description' => '2x16 Go a 6000 MHz - RAM DDR5 avec eclairage RGB.',                                  'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/a608e470b57d4a6d1df423f7c7a1567e3296a4a6.jpg',                                                'order' => 4],
            // Audio
            ['name' => 'GoXLR',                           'category' => 'Audio',         'description' => 'Table de mixage USB 4 canaux pour streamers - effets vocaux et faders motorises.',   'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/979828bf918f8b8a079b4e3f4a9487acdcd59094.jpg',                                                'order' => 1],
            ['name' => 'Shure SM7B',                      'category' => 'Audio',         'description' => 'Microphone dynamique broadcast legendaire - utilise par les plus grands streamers.',  'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/cd715f53d12345fe6050c99a1f2fb97df2f01c3d.jpg',                                                'order' => 2],
            // Streaming
            ['name' => 'Stream Deck',                     'category' => 'Streaming',     'description' => 'Controleur Elgato avec touches LCD personnalisables pour gerer ton stream.',          'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/362b20f7e95a7fa64514f6ce16d91576c0ec1a0f.jpg',                                                'order' => 1],
            ['name' => 'Launchpad Mini',                  'category' => 'Streaming',     'description' => 'Controleur MIDI Novation - pour les sons et effets en direct.',                      'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/1eef7b3c82f313a2a8096e10b22e51ba26817c44.jpg',                                                'order' => 2],
            ['name' => 'Rybozen Carte de Capture',        'category' => 'Streaming',     'description' => 'Carte de capture HDMI pour integrer des sources video externes dans le stream.',     'image_path' => null,                                                                                                                                                              'order' => 3],
            ['name' => 'CamLink',                         'category' => 'Streaming',     'description' => 'Adaptateur Elgato pour utiliser un appareil photo comme webcam en USB.',             'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/95e708bd75a3c196025e3c6d751bb89474d4d91a.jpg',                                                'order' => 4],
            ['name' => 'Sony Alpha 5000',                 'category' => 'Streaming',     'description' => 'Appareil photo Sony 20.1 Mpx utilise comme webcam haute qualite via CamLink.',       'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/87fe64f1a534aa22afab7794e742e670e7beede0.jpg',                                                'order' => 5],
            // Peripheriques
            ['name' => 'Mad Catz RAT 4+',                 'category' => 'Peripheriques', 'description' => 'Souris gaming optique avec design ergonomique reglable et boutons programmables.',   'image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/3b6a721aa1b316e6d11c47b917ea4c9c12d77964.jpg',                                                'order' => 1],
            ['name' => 'Razer Ornata V3 Tenkeyless',      'category' => 'Peripheriques', 'description' => 'Clavier gaming mecano-membranaire avec retroeclairage Chroma RGB sans pave numerique.','image_path' => 'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/10e1f56d1946be2448179d7bb6426af91583bc36.jpg',                                               'order' => 2],
        ];

        foreach ($items as $data) {
            SetupItem::updateOrCreate(['name' => $data['name']], array_merge($data, ['is_visible' => true]));
        }
    }
}
