<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;

class SocialController extends Controller
{
    public function index()
    {
        $socials = SocialLink::visible()->ordered()->get();
        return view('socials', compact('socials'));
    }
}
