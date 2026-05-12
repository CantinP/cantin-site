<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::ordered()->get();
        return view('admin.socials.index', compact('links'));
    }

    public function create() { return view('admin.socials.form', ['link' => new SocialLink]); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'platform'       => 'required|string|max:100',
            'url'            => 'required|url',
            'icon'           => 'nullable|string',
            'color'          => 'nullable|string|max:7',
            'show_in_navbar' => 'boolean',
            'show_in_footer' => 'boolean',
            'is_visible'     => 'boolean',
            'order'          => 'integer',
        ]);
        SocialLink::create($data);
        return redirect()->route('admin.social-links.index')->with('success', 'Lien ajouté.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.socials.form', ['link' => $socialLink]);
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $data = $request->validate([
            'platform'       => 'required|string|max:100',
            'url'            => 'required|url',
            'icon'           => 'nullable|string',
            'color'          => 'nullable|string|max:7',
            'show_in_navbar' => 'boolean',
            'show_in_footer' => 'boolean',
            'is_visible'     => 'boolean',
            'order'          => 'integer',
        ]);
        $socialLink->update($data);
        return redirect()->route('admin.social-links.index')->with('success', 'Lien mis à jour.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', 'Lien supprimé.');
    }
}
