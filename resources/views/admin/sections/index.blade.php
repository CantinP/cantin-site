@extends('layouts.admin')
@section('title', 'Sections de contenu')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-400">{{ $sections->count() }} sections</p>
    <a href="{{ route('admin.sections.create') }}" class="btn-primary">+ Ajouter</a>
</div>
<table class="w-full text-sm border border-gray-800 rounded-xl overflow-hidden">
    <thead class="bg-gray-800 text-gray-400">
        <tr>
            <th class="text-left px-4 py-2">Slug</th>
            <th class="text-left px-4 py-2">Titre</th>
            <th class="px-4 py-2">Visible</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $section)
        <tr class="border-t border-gray-800 hover:bg-gray-900">
            <td class="px-4 py-3 font-mono text-purple-300 text-xs">{{ $section->slug }}</td>
            <td class="px-4 py-3">{{ $section->title }}</td>
            <td class="px-4 py-3 text-center">{{ $section->is_visible ? '✅' : '❌' }}</td>
            <td class="px-4 py-3 text-center flex gap-2 justify-center">
                <a href="{{ route('admin.sections.edit', $section) }}" class="text-purple-400 hover:text-purple-300">Modifier</a>
                <form action="{{ route('admin.sections.destroy', $section) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="text-red-400 hover:text-red-300">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
