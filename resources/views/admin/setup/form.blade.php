@extends('layouts.admin')
@section('title', $item->exists ? 'Modifier un élément du setup' : 'Ajouter un élément du setup')
@section('content')
<section class="admin-panel max-w-5xl">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">{{ $item->exists ? 'Modifier '.$item->name : 'Nouveau matériel' }}</h2>
            <p class="admin-panel-subtitle">Tu peux uploader une image ou coller une URL d'image externe.</p>
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
                    <input type="text" name="category" value="{{ old('category', $item->category) }}" class="admin-input" required placeholder="PC, Audio, Streaming, Périphériques…">
                </div>
            </div>

            <div>
                <label class="admin-label">Description</label>
                <textarea name="description" rows="4" class="admin-input">{{ old('description', $item->description) }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="admin-label">Prix (€)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}" class="admin-input">
                </div>
                <div>
                    <label class="admin-label">Lien produit (affilié)</label>
                    <input type="url" name="affiliate_url" value="{{ old('affiliate_url', $item->affiliate_url) }}" class="admin-input">
                </div>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 space-y-4">
                <p class="text-sm font-semibold text-white">Image du produit</p>
                <div>
                    <label class="admin-label">Uploader une image (fichier)</label>
                    <input type="file" name="image" accept="image/*" class="admin-input">
                </div>
                <div class="flex items-center gap-3 text-slate-500 text-sm"><span>— ou —</span></div>
                <div>
                    <label class="admin-label">URL d'image externe</label>
                    <input type="url" name="image_url" value="{{ old('image_url', filter_var($item->image_path ?? '', FILTER_VALIDATE_URL) ? $item->image_path : '') }}" class="admin-input" placeholder="https://example.com/image.jpg">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5 items-end">
                <label class="admin-toggle">
                    <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $item->is_visible ?? true) ? 'checked' : '' }} class="w-4 h-4">
                    <span>Afficher sur le site</span>
                </label>
                <div>
                    <label class="admin-label">Ordre</label>
                    <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" class="admin-input">
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <button class="btn-primary">{{ $item->exists ? 'Mettre à jour' : 'Créer' }}</button>
                <a href="{{ route('admin.setup-items.index') }}" class="btn-secondary">Annuler</a>
            </div>
        </div>

        <aside class="rounded-3xl border border-slate-800 bg-slate-900/80 p-6 space-y-5">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Aperçu image</p>
                @if($item->image_path)
                    <img src="{{ $item->image_path }}"
                         alt="{{ $item->name }}"
                         class="mt-3 w-full h-52 rounded-2xl object-contain bg-slate-800 p-4"
                         onerror="this.parentElement.innerHTML='<div class=h-52 flex items-center justify-center text-6xl>📦</div>'">
                @else
                    <div class="mt-3 h-52 rounded-2xl bg-slate-800 flex items-center justify-center text-6xl">📦</div>
                @endif
            </div>
            <div class="space-y-2 text-sm text-slate-300">
                <p><span class="text-slate-500">Nom :</span> {{ $item->name ?: '—' }}</p>
                <p><span class="text-slate-500">Catégorie :</span> {{ $item->category ?: '—' }}</p>
                <p><span class="text-slate-500">Prix :</span> {{ $item->price ? number_format($item->price, 2).' €' : '—' }}</p>
            </div>
        </aside>
    </form>
</section>
@endsection
