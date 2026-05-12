<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::orderBy('group')->orderBy('order')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function edit(SiteSetting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, SiteSetting $setting)
    {
        $request->validate(['value' => 'nullable|string']);
        $setting->update(['value' => $request->value]);
        return redirect()->route('admin.settings.index')->with('success', 'Paramètre mis à jour.');
    }
}
