<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetupItemController extends Controller
{
    public function index()
    {
        $items = SetupItem::orderBy('category')->ordered()->get();
        return view('admin.setup.index', compact('items'));
    }

    public function create()
    {
        return view('admin.setup.form', ['item' => new SetupItem]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:100',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|max:4096',
            'affiliate_url' => 'nullable|url',
            'price'         => 'nullable|numeric',
            'is_visible'    => 'boolean',
            'order'         => 'integer',
        ]);
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('setup', 'public');
        }
        SetupItem::create($data);
        return redirect()->route('admin.setup-items.index')->with('success', 'Élément ajouté.');
    }

    public function edit(SetupItem $setupItem)
    {
        return view('admin.setup.form', ['item' => $setupItem]);
    }

    public function update(Request $request, SetupItem $setupItem)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:100',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|max:4096',
            'affiliate_url' => 'nullable|url',
            'price'         => 'nullable|numeric',
            'is_visible'    => 'boolean',
            'order'         => 'integer',
        ]);
        if ($request->hasFile('image')) {
            if ($setupItem->image_path) Storage::disk('public')->delete($setupItem->image_path);
            $data['image_path'] = $request->file('image')->store('setup', 'public');
        }
        $setupItem->update($data);
        return redirect()->route('admin.setup-items.index')->with('success', 'Élément mis à jour.');
    }

    public function destroy(SetupItem $setupItem)
    {
        if ($setupItem->image_path) Storage::disk('public')->delete($setupItem->image_path);
        $setupItem->delete();
        return back()->with('success', 'Élément supprimé.');
    }
}
