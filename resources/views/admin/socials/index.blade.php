@extends('layouts.admin')
@section('title', 'Réseaux sociaux')
@section('content')
<section class="admin-panel">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">Liens de réseaux</h2>
            <p class="admin-panel-subtitle">Affichage, ordre, icône et URL modifiables proprement.</p>
        </div>
        <a href="{{ route('admin.social-links.create') }}" class="btn-primary">+ Ajouter un réseau</a>
    </div>

    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Plateforme</th>
                    <th>URL</th>
                    <th>Placement</th>
                    <th>Visible</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($links as $link)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl flex items-center justify-center" style="background: {{ $link->color ?? '#334155' }}20; color: {{ $link->color ?? '#cbd5e1' }};">
                                    <i class="{{ $link->icon }}"></i>
                                </span>
                                <div>
                                    <div class="font-semibold text-white">{{ $link->platform }}</div>
                                    <div class="text-xs text-slate-500">Ordre : {{ $link->order }}</div>
                                </div>
                            </div>
                        </td>
                        <td><div class="max-w-md truncate text-slate-300">{{ $link->url }}</div></td>
                        <td>
                            <div class="flex flex-wrap gap-2">
                                @if($link->show_in_navbar)<span class="admin-badge">Navbar</span>@endif
                                @if($link->show_in_footer)<span class="admin-badge">Footer</span>@endif
                            </div>
                        </td>
                        <td>{!! $link->is_visible ? '<span class="text-emerald-400">Visible</span>' : '<span class="text-slate-500">Masqué</span>' !!}</td>
                        <td class="text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.social-links.edit', $link) }}" class="btn-secondary">Modifier</a>
                                <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" onsubmit="return confirm('Supprimer ce lien ?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-slate-500 py-10">Aucun réseau configuré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
