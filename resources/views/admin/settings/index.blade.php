@extends('layouts.admin')
@section('title', 'Paramètres')
@section('content')
<div class="max-w-4xl">
    @foreach($settings as $group => $items)
        <h2 class="text-purple-400 font-bold uppercase tracking-widest text-sm mb-3 mt-8">{{ $group }}</h2>
        <table class="w-full text-sm mb-6 border border-gray-800 rounded-xl overflow-hidden">
            <thead class="bg-gray-800 text-gray-400">
                <tr>
                    <th class="text-left px-4 py-2">Label</th>
                    <th class="text-left px-4 py-2">Valeur</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $setting)
                    <tr class="border-t border-gray-800 hover:bg-gray-900">
                        <td class="px-4 py-3 text-gray-300">{{ $setting->label }}</td>
                        <td class="px-4 py-3 text-white font-mono truncate max-w-xs">{{ $setting->value }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.settings.edit', $setting) }}"
                               class="text-purple-400 hover:text-purple-300 text-xs">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection
