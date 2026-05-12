@extends('layouts.admin')
@section('title', $section->exists ? 'Modifier' : 'Nouvelle section')
@section('content')
<div class="max-w-2xl">
    <form action="{{ $section->exists ? route('admin.sections.update', $section) : route('admin.sections.store') }}"
          method="POST" class="space-y-4">
        @csrf
        @if($section->exists) @method('PUT') @endif

        @unless($section->exists)
        <div>
            <label class="admin-label">Slug * <span class="text-gray-500 text-xs">(identifiant unique, ex: home_intro)</span></label>
            <input type="text" name="slug" value="{{ old('slug') }}" class="admin-input font-mono" required>
        </div>
        @endunless

        <div>
            <label class="admin-label">Titre</label>
            <input type="text" name="title" value="{{ old('title', $section->title) }}" class="admin-input">
        </div>
        <div>
            <label class="admin-label">Contenu (HTML autorisé)</label>
            <textarea name="content" rows="8" class="admin-input font-mono text-sm">{{ old('content', $section->content) }}</textarea>
        </div>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $section->is_visible ?? true) ? 'checked' : '' }}>
            <span class="text-sm text-gray-300">Visible</span>
        </label>
        <div class="flex gap-3 pt-2">
            <button class="btn-primary">{{ $section->exists ? 'Mettre à jour' : 'Créer' }}</button>
            <a href="{{ route('admin.sections.index') }}" class="btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
