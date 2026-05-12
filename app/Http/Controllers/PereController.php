<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SiteSetting;
use App\Models\SocialLink;

class PereController extends Controller
{
    public function index()
    {
        $section     = Section::getBySlug('pere_description');
        $pereUrl     = SiteSetting::get('pere_website_url', 'https://web-croqueur.fr');
        $socials     = SocialLink::visible()->navbar()->ordered()->get();
        return view('pere', compact('section', 'pereUrl', 'socials'));
    }
}
