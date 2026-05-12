@extends('layouts.admin')
@section('title', 'Paramètres')
@section('content')
<div class="space-y-6">
    @foreach($settings as $group => $items)
        <section class="admin-panel">
            <div class="admin-panel-header">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-fuchsia-300 mb-1">{{ $group }}</p>
                    <h2 class="admin-panel-title">Paramètres {{ $group }}</h2>
                    <p class="admin-panel-subtitle">Chaque valeur actuelle est visible avant modification.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Clé</th>
                            <th>Valeur actuelle</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $setting)
                            <tr>
                                <td>
                                    <div class="font-semibold text-white">{{ $setting->label }}</div>
                                    <div class="text-xs text-slate-500">Type : {{ $setting->type }}</div>
                                </td>
                                <td><code class="text-fuchsia-300 text-xs">{{ $setting->key }}</code></td>
                                <td>
                                    <div class="max-w-md truncate text-slate-300">{{ $setting->value ?: '—' }}</div>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('admin.settings.edit', $setting) }}" class="btn-secondary">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endforeach
</div>
@endsection
