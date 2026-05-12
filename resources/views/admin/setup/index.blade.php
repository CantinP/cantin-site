@extends('layouts.admin')
@section('title', 'Setup')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-400">{{ $items->count() }} éléments</p>
    <a href="{{ route('admin.setup-items.create') }}" class="btn-primary">+ Ajouter</a>
</div>
<table class="w-full text-sm border border-gray-800 rounded-xl overflow-hidden">
    <thead class="bg-gray-800 text-gray-400">
        <tr>
            <th class="text-left px-4 py-2">Nom</th>
            <th class="text-left px-4 py-2">Catégorie</th>
            <th class="text-left px-4 py-2">Prix</th>
            <th class="px-4 py-2">Visible</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr class="border-t border-gray-800 hover:bg-gray-900">
            <td class="px-4 py-3">{{ $item->name }}</td>
            <td class="px-4 py-3 text-gray-400">{{ $item->category }}</td>
            <td class="px-4 py-3">{{ $item->price ? number_format($item->price, 2).'€' : '—' }}</td>
            <td class="px-4 py-3 text-center">{{ $item->is_visible ? '✅' : '❌' }}</td>
            <td class="px-4 py-3 text-center flex gap-2 justify-center">
                <a href="{{ route('admin.setup-items.edit', $item) }}" class="text-purple-400 hover:text-purple-300">Modifier</a>
                <form action="{{ route('admin.setup-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="text-red-400 hover:text-red-300">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
