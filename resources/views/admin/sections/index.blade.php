@extends('layouts.admin')
@section('title', 'Sections de contenu')
@section('content')
<section class="admin-panel">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">Textes et blocs du site</h2>
            <p class="admin-panel-subtitle">Idéal pour modifier l'accueil, la section don, la présentation de ton père, etc.</p>
        </div>
        <a href="{{ route('admin.sections.create') }}" class="btn-primary">+ Ajouter une section</a>
    </div>

    <div class="grid gap-4">
        @forelse($sections as $section)
            <article class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="min-w-0">
                    <div class="flex items-center gap-3 flex-wrap">
                        <h3 class="font-semibold text-white text-lg">{{ $section->title ?: 'Sans titre' }}</h3>
                        <span class="admin-badge">{{ $section->slug }}</span>
                        {!! $section->is_visible ? '<span class="text-emerald-400 text-sm">Visible</span>' : '<span class="text-slate-500 text-sm">Masquée</span>' !!}
                    </div>
                    <p class="text-sm text-slate-400 mt-2 line-clamp-2">{{ strip_tags($section->content) ?: 'Aucun contenu' }}</p>
                </div>
                <div class="flex gap-2 shrink-0">
                    <a href="{{ route('admin.sections.edit', $section) }}" class="btn-secondary">Modifier</a>
                    <form action="{{ route('admin.sections.destroy', $section) }}" method="POST" onsubmit="return confirm('Supprimer cette section ?')">
                        @csrf @method('DELETE')
                        <button class="btn-danger">Supprimer</button>
                    </form>
                </div>
            </article>
        @empty
            <div class="text-center text-slate-500 py-12">Aucune section créée.</div>
        @endforelse
    </div>
</section>
@endsection
