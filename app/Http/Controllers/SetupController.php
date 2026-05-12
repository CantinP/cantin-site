<?php

namespace App\Http\Controllers;

use App\Models\SetupItem;
use App\Models\SocialLink;

class SetupController extends Controller
{
    public function index()
    {
        $items   = SetupItem::visible()->ordered()->get()->groupBy('category');
        $socials = SocialLink::visible()->navbar()->ordered()->get();
        return view('setup', compact('items', 'socials'));
    }
}
