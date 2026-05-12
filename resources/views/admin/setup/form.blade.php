@extends('layouts.admin')
@section('title', $item->exists ? 'Modifier un élément du setup' : 'Ajouter un élément du setup')
@section('content')
<section class="admin-panel max-w-5xl">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">{{ $item->exists ? 'Modifier '.$item->name : 'Nouveau matériel' }}</h2>
            <p class="admin-panel-subtitle">Tous les champs reprennent automatiquement les valeurs actuelles.</p>
        </div>
    </div>

    <form action="{{ $item->exists ? route('admin.setup-items.update', $item) : route('admin.setup-items.store') }}" method="POST" enctype="multipart/form-data" class="grid xl:grid-cols-[1.3fr_0.7fr] gap-6">
        @csrf
        @if($item->exists) @method('PUT') @endif

        <div class="space-y-5">
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="admin-label">Nom *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name) }}" class="admin-input" required>
                </div>
                <div>
                    <label class="admin-label">Catégorie *</label>
                    <input type="text" name="category" value="{{ old('category', $item->category) }}" class="admin-input" required>
                </div>
            </div>

            <div>
                <label class="admin-label">Description</label>
                <textarea name="description" rows="5" class="admin-input">{{ old('description', $item->description) }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="admin-label">Prix</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}" class="admin-input">
                </div>
                <div>
                    <label class="admin-label">Lien produit</label>
                    <input type="url" name="affiliate_url" value="{{ old('affiliate_url', $item->affiliate_url) }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5 items-end">
                <div>
                    <label class="admin-label">Image</label>
                    <input type="file" name="image" accept="image/*" class="admin-input">
                </div>
                <div>
                    <label class="admin-label">Ordre</label>
                    <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" class="admin-input">
                </div>
            </div>

            <label class="inline-flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-3 cursor-pointer">
                <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $item->is_visible ?? true) ? 'checked' : '' }} class="w-4 h-4">
                <span class="text-sm text-slate-300">Afficher cet élément sur le site</span>
            </label>

            <div class="flex flex-wrap gap-3">
                <button class="btn-primary">{{ $item->exists ? 'Mettre à jour' : 'Créer' }}</button>
                <a href="{{ route('admin.setup-items.index') }}" class="btn-secondary">Annuler</a>
            </div>
        </div>

        <aside class="rounded-3xl border border-slate-800 bg-slate-900/80 p-6 space-y-5">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Aperçu actuel</p>
                @if($item->image_path)
                    <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}" class="mt-3 w-full h-56 rounded-2xl object-contain bg-slate-800 p-4">
                @else
                    <div class="mt-3 h-56 rounded-2xl bg-slate-800 flex items-center justify-center text-6xl">📦</div>
                @endif
            </div>
            <div class="space-y-2 text-sm text-slate-300">
                <p><span class="text-slate-500">Nom :</span> {{ $item->name ?: 'Non défini' }}</p>
                <p><span class="text-slate-500">Catégorie :</span> {{ $item->category ?: 'Non définie' }}</p>
                <p><span class="text-slate-500">Prix :</span> {{ $item->price ? number_format($item->price, 2).' €' : '—' }}</p>
            </div>
        </aside>
    </form>
</section>
@endsection
