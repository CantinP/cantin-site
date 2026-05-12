<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SocialLink;

class AboutController extends Controller
{
    public function index()
    {
        $section = Section::getBySlug('about');
        $socials  = SocialLink::visible()->navbar()->ordered()->get();
        return view('about', compact('section', 'socials'));
    }
}
