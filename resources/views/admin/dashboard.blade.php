@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
    <div class="admin-stat-card">
        <div class="admin-stat-icon bg-fuchsia-600/20 text-fuchsia-300"><i class="fa-solid fa-desktop"></i></div>
        <div>
            <p class="admin-stat-label">Éléments setup</p>
            <p class="admin-stat-value">{{ $setupCount }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon bg-cyan-600/20 text-cyan-300"><i class="fa-solid fa-share-nodes"></i></div>
        <div>
            <p class="admin-stat-label">Réseaux</p>
            <p class="admin-stat-value">{{ $socialCount }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon bg-amber-500/20 text-amber-300"><i class="fa-solid fa-sliders"></i></div>
        <div>
            <p class="admin-stat-label">Paramètres</p>
            <p class="admin-stat-value">{{ $settingCount }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon bg-emerald-500/20 text-emerald-300"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
        <div>
            <p class="admin-stat-label">Gestion</p>
            <p class="admin-stat-value">100%</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <section class="admin-panel xl:col-span-2">
        <div class="admin-panel-header">
            <div>
                <h2 class="admin-panel-title">Accès rapides</h2>
                <p class="admin-panel-subtitle">Les sections les plus utiles pour mettre à jour ton site.</p>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.settings.index') }}" class="admin-shortcut-card"><i class="fa-solid fa-sliders"></i><span>Modifier les paramètres</span></a>
            <a href="{{ route('admin.sections.index') }}" class="admin-shortcut-card"><i class="fa-solid fa-file-pen"></i><span>Modifier les textes</span></a>
            <a href="{{ route('admin.setup-items.index') }}" class="admin-shortcut-card"><i class="fa-solid fa-desktop"></i><span>Gérer le setup</span></a>
            <a href="{{ route('admin.social-links.index') }}" class="admin-shortcut-card"><i class="fa-solid fa-share-nodes"></i><span>Gérer les réseaux</span></a>
        </div>
    </section>

    <section class="admin-panel">
        <div class="admin-panel-header">
            <div>
                <h2 class="admin-panel-title">Rappels</h2>
                <p class="admin-panel-subtitle">Bonnes pratiques pour éviter les erreurs.</p>
            </div>
        </div>
        <ul class="space-y-3 text-sm text-slate-300">
            <li class="admin-tip"><i class="fa-solid fa-circle-check text-emerald-400"></i><span>Les formulaires gardent les valeurs actuelles.</span></li>
            <li class="admin-tip"><i class="fa-solid fa-image text-fuchsia-400"></i><span>Pense à faire <code class="text-fuchsia-300">php artisan storage:link</code> pour les images.</span></li>
            <li class="admin-tip"><i class="fa-solid fa-video text-violet-400"></i><span>Twitch exige le paramètre <code class="text-violet-300">parent</code> pour l'embed. [web:32]</span></li>
        </ul>
    </section>
</div>
@endsection
