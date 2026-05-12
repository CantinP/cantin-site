@extends('layouts.admin')
@section('title', $section->exists ? 'Modifier une section' : 'Créer une section')
@section('content')
<section class="admin-panel max-w-5xl">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">{{ $section->exists ? ($section->title ?: 'Section sans titre') : 'Nouvelle section' }}</h2>
            <p class="admin-panel-subtitle">Le contenu actuel est prérempli pour éviter toute perte involontaire.</p>
        </div>
    </div>

    <form action="{{ $section->exists ? route('admin.sections.update', $section) : route('admin.sections.store') }}" method="POST" class="grid xl:grid-cols-[1.2fr_0.8fr] gap-6">
        @csrf
        @if($section->exists) @method('PUT') @endif

        <div class="space-y-5">
            @unless($section->exists)
                <div>
                    <label class="admin-label">Slug *</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="admin-input font-mono" placeholder="home_intro" required>
                </div>
            @endunless

            <div>
                <label class="admin-label">Titre</label>
                <input type="text" name="title" value="{{ old('title', $section->title) }}" class="admin-input">
            </div>

            <div>
                <label class="admin-label">Contenu</label>
                <textarea name="content" rows="12" class="admin-input">{{ old('content', $section->content) }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-3">
                <label class="admin-toggle"><input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $section->is_visible ?? true) ? 'checked' : '' }}><span>Section visible</span></label>
                <div>
                    <label class="admin-label">Ordre</label>
                    <input type="number" name="order" value="{{ old('order', $section->order ?? 0) }}" class="admin-input">
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <button class="btn-primary">{{ $section->exists ? 'Mettre à jour' : 'Créer' }}</button>
                <a href="{{ route('admin.sections.index') }}" class="btn-secondary">Annuler</a>
            </div>
        </div>

        <aside class="rounded-3xl border border-slate-800 bg-slate-900/80 p-6 space-y-4">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Aperçu texte</p>
                <div class="mt-3 rounded-2xl border border-slate-800 bg-slate-950 p-4 text-sm text-slate-300 whitespace-pre-wrap">{{ old('content', strip_tags($section->content)) ?: 'Le contenu apparaîtra ici.' }}</div>
            </div>
            @if($section->exists)
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Slug</p>
                    <code class="mt-2 inline-block text-fuchsia-300">{{ $section->slug }}</code>
                </div>
            @endif
        </aside>
    </form>
</section>
@endsection
