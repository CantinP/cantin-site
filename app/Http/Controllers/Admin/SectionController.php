<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('order')->get();
        return view('admin.sections.index', compact('sections'));
    }

    public function create() { return view('admin.sections.form', ['section' => new Section]); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slug'       => 'required|string|unique:sections,slug',
            'title'      => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'is_visible' => 'boolean',
            'order'      => 'integer',
        ]);
        Section::create($data);
        return redirect()->route('admin.sections.index')->with('success', 'Section créée.');
    }

    public function edit(Section $section)
    {
        return view('admin.sections.form', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'title'      => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'is_visible' => 'boolean',
            'order'      => 'integer',
        ]);
        $section->update($data);
        return redirect()->route('admin.sections.index')->with('success', 'Section mise à jour.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return back()->with('success', 'Section supprimée.');
    }
}
