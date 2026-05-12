@extends('layouts.app')
@section('title', 'Mes Réseaux — Cantin')
@section('content')
<div class="max-w-3xl mx-auto px-4 py-16 text-center">
    <h1 class="text-3xl font-bold text-purple-400 mb-2">🌐 Mes Réseaux</h1>
    <p class="text-gray-400 mb-10">Retrouve-moi partout !</p>

    <div class="flex flex-col gap-4">
        @foreach($socials as $social)
            <a href="{{ $social->url }}" target="_blank" rel="noopener"
               class="flex items-center gap-4 px-6 py-4 rounded-xl font-semibold text-lg hover:scale-105 transition-transform"
               style="background-color: {{ $social->color ?? '#374151' }}20; border: 2px solid {{ $social->color ?? '#6b7280' }};">
                <i class="{{ $social->icon }} text-2xl" style="color: {{ $social->color ?? '#fff' }}"></i>
                <span>{{ $social->platform }}</span>
                <span class="ml-auto text-sm opacity-60 truncate max-w-xs">{{ $social->url }}</span>
            </a>
        @endforeach
    </div>
</div>
@endsection
