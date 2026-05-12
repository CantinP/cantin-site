<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Section;
use App\Models\SocialLink;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $kofi      = SiteSetting::get('kofi_url', 'https://ko-fi.com/cantin');
        $tipeee    = SiteSetting::get('tipeee_url', 'https://fr.tipeee.com/cantin');
        $section   = Section::getBySlug('donation_text');
        $socials   = SocialLink::visible()->navbar()->ordered()->get();
        $donations = Donation::latest()->take(20)->get();
        return view('donation', compact('kofi', 'tipeee', 'section', 'socials', 'donations'));
    }
}
