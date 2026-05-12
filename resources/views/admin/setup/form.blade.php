@extends('layouts.admin')
@section('title', $item->exists ? 'Modifier' : 'Ajouter un élément')
@section('content')
<div class="max-w-2xl">
    <form action="{{ $item->exists ? route('admin.setup-items.update', $item) : route('admin.setup-items.store') }}"
          method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @if($item->exists) @method('PUT') @endif

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="admin-label">Nom *</label>
                <input type="text" name="name" value="{{ old('name', $item->name) }}" class="admin-input" required>
            </div>
            <div>
                <label class="admin-label">Catégorie *</label>
                <input type="text" name="category" value="{{ old('category', $item->category) }}" class="admin-input"
                       placeholder="PC, Périphériques, Audio…" required>
            </div>
        </div>
        <div>
            <label class="admin-label">Description</label>
            <textarea name="description" rows="3" class="admin-input">{{ old('description', $item->description) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="admin-label">Prix (€)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}" class="admin-input">
            </div>
            <div>
                <label class="admin-label">URL affilié</label>
                <input type="url" name="affiliate_url" value="{{ old('affiliate_url', $item->affiliate_url) }}" class="admin-input">
            </div>
        </div>
        <div>
            <label class="admin-label">Image</label>
            @if($item->image_path)
                <img src="{{ Storage::url($item->image_path) }}" class="w-32 h-32 object-contain mb-2 bg-gray-800 rounded">
            @endif
            <input type="file" name="image" accept="image/*" class="admin-input">
        </div>
        <div class="flex items-center gap-3">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $item->is_visible) ? 'checked' : '' }} class="w-4 h-4">
                <span class="admin-label mb-0">Visible</span>
            </label>
            <div class="flex-1">
                <label class="admin-label">Ordre</label>
                <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" class="admin-input w-24">
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button class="btn-primary">{{ $item->exists ? 'Mettre à jour' : 'Créer' }}</button>
            <a href="{{ route('admin.setup-items.index') }}" class="btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
