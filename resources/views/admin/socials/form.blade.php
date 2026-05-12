@extends('layouts.admin')
@section('title', $link->exists ? 'Modifier' : 'Ajouter un réseau')
@section('content')
<div class="max-w-xl">
    <form action="{{ $link->exists ? route('admin.social-links.update', $link) : route('admin.social-links.store') }}"
          method="POST" class="space-y-4">
        @csrf
        @if($link->exists) @method('PUT') @endif

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="admin-label">Plateforme *</label>
                <input type="text" name="platform" value="{{ old('platform', $link->platform) }}" class="admin-input" required>
            </div>
            <div>
                <label class="admin-label">Icône Font Awesome</label>
                <input type="text" name="icon" value="{{ old('icon', $link->icon) }}" placeholder="fab fa-twitch" class="admin-input">
            </div>
        </div>
        <div>
            <label class="admin-label">URL *</label>
            <input type="url" name="url" value="{{ old('url', $link->url) }}" class="admin-input" required>
        </div>
        <div>
            <label class="admin-label">Couleur (hex)</label>
            <input type="color" name="color" value="{{ old('color', $link->color ?? '#9146FF') }}" class="admin-input w-24 h-10">
        </div>
        <div class="flex gap-6">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="show_in_navbar" value="1" {{ $link->show_in_navbar ? 'checked' : '' }}>
                <span class="text-sm text-gray-300">Navbar</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="show_in_footer" value="1" {{ $link->show_in_footer ? 'checked' : '' }}>
                <span class="text-sm text-gray-300">Footer</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_visible" value="1" {{ $link->is_visible ? 'checked' : '' }}>
                <span class="text-sm text-gray-300">Visible</span>
            </label>
        </div>
        <div class="flex gap-3 pt-2">
            <button class="btn-primary">{{ $link->exists ? 'Mettre à jour' : 'Créer' }}</button>
            <a href="{{ route('admin.social-links.index') }}" class="btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
