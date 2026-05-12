@extends('layouts.admin')
@section('title', 'Réseaux sociaux')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-400">{{ $links->count() }} liens</p>
    <a href="{{ route('admin.social-links.create') }}" class="btn-primary">+ Ajouter</a>
</div>
<table class="w-full text-sm border border-gray-800 rounded-xl overflow-hidden">
    <thead class="bg-gray-800 text-gray-400">
        <tr>
            <th class="text-left px-4 py-2">Plateforme</th>
            <th class="text-left px-4 py-2">URL</th>
            <th class="px-4 py-2">Navbar</th>
            <th class="px-4 py-2">Footer</th>
            <th class="px-4 py-2">Visible</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($links as $link)
        <tr class="border-t border-gray-800 hover:bg-gray-900">
            <td class="px-4 py-3">
                <i class="{{ $link->icon }}" style="color:{{ $link->color }}"></i>
                {{ $link->platform }}
            </td>
            <td class="px-4 py-3 text-gray-400 truncate max-w-xs text-xs">{{ $link->url }}</td>
            <td class="px-4 py-3 text-center">{{ $link->show_in_navbar ? '✅' : '❌' }}</td>
            <td class="px-4 py-3 text-center">{{ $link->show_in_footer ? '✅' : '❌' }}</td>
            <td class="px-4 py-3 text-center">{{ $link->is_visible ? '✅' : '❌' }}</td>
            <td class="px-4 py-3 text-center flex gap-2 justify-center">
                <a href="{{ route('admin.social-links.edit', $link) }}" class="text-purple-400 hover:text-purple-300">Modifier</a>
                <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="text-red-400 hover:text-red-300">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
