<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupItem;
use App\Models\SocialLink;
use App\Models\SiteSetting;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'setupCount'  => SetupItem::count(),
            'socialCount' => SocialLink::count(),
            'settingCount'=> SiteSetting::count(),
        ]);
    }
}
