@extends('layouts.admin')
@section('title', 'Setup')
@section('content')
<section class="admin-panel">
    <div class="admin-panel-header">
        <div>
            <h2 class="admin-panel-title">Matériel et équipements</h2>
            <p class="admin-panel-subtitle">Tous les éléments sont triés et éditables sans perdre leurs valeurs actuelles.</p>
        </div>
        <a href="{{ route('admin.setup-items.create') }}" class="btn-primary">+ Ajouter un élément</a>
    </div>

    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Ordre</th>
                    <th>Visible</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>
                            <div class="font-semibold text-white">{{ $item->name }}</div>
                            <div class="text-xs text-slate-500 truncate max-w-sm">{{ $item->description ?: 'Pas de description' }}</div>
                        </td>
                        <td><span class="admin-badge">{{ $item->category }}</span></td>
                        <td>{{ $item->price ? number_format($item->price, 2).' €' : '—' }}</td>
                        <td>{{ $item->order }}</td>
                        <td>{!! $item->is_visible ? '<span class="text-emerald-400">Visible</span>' : '<span class="text-slate-500">Masqué</span>' !!}</td>
                        <td class="text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.setup-items.edit', $item) }}" class="btn-secondary">Modifier</a>
                                <form action="{{ route('admin.setup-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Supprimer cet élément ?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-slate-500 py-10">Aucun élément pour l'instant.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
