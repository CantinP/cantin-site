<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function index()
    {
        $twitchChannel = SiteSetting::get('twitch_channel', 'cantin');
        $socials       = SocialLink::visible()->navbar()->ordered()->get();
        return view('home', compact('twitchChannel', 'socials'));
    }
}
