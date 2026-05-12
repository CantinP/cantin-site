<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\SocialLink;

class VideoController extends Controller
{
    public function index()
    {
        $apiKey      = SiteSetting::get('youtube_api_key');
        $channelId   = SiteSetting::get('youtube_channel_id');
        $channelVod  = SiteSetting::get('youtube_vod_channel_id');
        $socials     = SocialLink::visible()->navbar()->ordered()->get();
        return view('videos', compact('apiKey', 'channelId', 'channelVod', 'socials'));
    }
}
