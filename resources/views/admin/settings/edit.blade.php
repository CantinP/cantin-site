@extends('layouts.admin')
@section('title', 'Modifier un paramètre')
@section('content')
<section class="admin-panel max-w-3xl">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">{{ $setting->label }}</h2>
            <p class="admin-panel-subtitle">Valeur actuelle préchargée, tu ne modifies que ce dont tu as besoin.</p>
        </div>
    </div>

    <div class="grid md:grid-cols-[1.3fr_0.7fr] gap-6">
        <form action="{{ route('admin.settings.update', $setting) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="admin-label">Clé technique</label>
                <input type="text" class="admin-input opacity-70" value="{{ $setting->key }}" disabled>
            </div>

            <div>
                <label class="admin-label">Valeur</label>
                @if($setting->type === 'html')
                    <textarea name="value" rows="10" class="admin-input">{{ old('value', $setting->value) }}</textarea>
                @else
                    <input type="text" name="value" value="{{ old('value', $setting->value) }}" class="admin-input">
                @endif
            </div>

            <div class="flex flex-wrap gap-3">
                <button class="btn-primary">Enregistrer</button>
                <a href="{{ route('admin.settings.index') }}" class="btn-secondary">Retour</a>
            </div>
        </form>

        <aside class="rounded-2xl border border-slate-800 bg-slate-900/70 p-5 space-y-4">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Aperçu</p>
                <p class="mt-2 text-sm text-slate-300 break-all">{{ $setting->value ?: 'Aucune valeur définie' }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Groupe</p>
                <p class="mt-2 text-sm text-white">{{ $setting->group }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Type</p>
                <p class="mt-2 text-sm text-white">{{ $setting->type }}</p>
            </div>
        </aside>
    </div>
</section>
@endsection
