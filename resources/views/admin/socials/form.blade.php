@extends('layouts.admin')
@section('title', $link->exists ? 'Modifier un réseau' : 'Ajouter un réseau')
@section('content')
<section class="admin-panel max-w-5xl">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">{{ $link->exists ? 'Modifier '.$link->platform : 'Nouveau réseau social' }}</h2>
            <p class="admin-panel-subtitle">Les valeurs existantes sont toujours reprises automatiquement.</p>
        </div>
    </div>

    <form action="{{ $link->exists ? route('admin.social-links.update', $link) : route('admin.social-links.store') }}" method="POST" class="grid xl:grid-cols-[1.2fr_0.8fr] gap-6">
        @csrf
        @if($link->exists) @method('PUT') @endif

        <div class="space-y-5">
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="admin-label">Plateforme *</label>
                    <input type="text" name="platform" value="{{ old('platform', $link->platform) }}" class="admin-input" required>
                </div>
                <div>
                    <label class="admin-label">Icône Font Awesome</label>
                    <input type="text" name="icon" value="{{ old('icon', $link->icon) }}" class="admin-input" placeholder="fab fa-twitch">
                </div>
            </div>

            <div>
                <label class="admin-label">URL *</label>
                <input type="url" name="url" value="{{ old('url', $link->url) }}" class="admin-input" required>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="admin-label">Couleur</label>
                    <input type="color" name="color" value="{{ old('color', $link->color ?? '#9146FF') }}" class="admin-input h-12 w-28 p-2">
                </div>
                <div>
                    <label class="admin-label">Ordre</label>
                    <input type="number" name="order" value="{{ old('order', $link->order ?? 0) }}" class="admin-input">
                </div>
            </div>

            <div class="grid sm:grid-cols-3 gap-3">
                <label class="admin-toggle"><input type="checkbox" name="show_in_navbar" value="1" {{ old('show_in_navbar', $link->show_in_navbar ?? true) ? 'checked' : '' }}><span>Afficher en navbar</span></label>
                <label class="admin-toggle"><input type="checkbox" name="show_in_footer" value="1" {{ old('show_in_footer', $link->show_in_footer ?? true) ? 'checked' : '' }}><span>Afficher en footer</span></label>
                <label class="admin-toggle"><input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $link->is_visible ?? true) ? 'checked' : '' }}><span>Réseau visible</span></label>
            </div>

            <div class="flex flex-wrap gap-3">
                <button class="btn-primary">{{ $link->exists ? 'Mettre à jour' : 'Créer' }}</button>
                <a href="{{ route('admin.social-links.index') }}" class="btn-secondary">Annuler</a>
            </div>
        </div>

        <aside class="rounded-3xl border border-slate-800 bg-slate-900/80 p-6">
            <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Aperçu</p>
            <div class="mt-5 rounded-2xl border border-slate-800 bg-slate-950 p-5 flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-xl" style="background: {{ old('color', $link->color ?? '#9146FF') }}20; color: {{ old('color', $link->color ?? '#9146FF') }};">
                    <i class="{{ old('icon', $link->icon ?: 'fa-solid fa-link') }}"></i>
                </div>
                <div>
                    <div class="font-semibold text-white">{{ old('platform', $link->platform ?: 'Nom du réseau') }}</div>
                    <div class="text-sm text-slate-400 break-all">{{ old('url', $link->url ?: 'https://...') }}</div>
                </div>
            </div>
        </aside>
    </form>
</section>
@endsection
