@extends('layouts.app')
@section('title', 'Mon Père — Cantin')
@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-purple-400 mb-2">👨 Mon Père</h1>

    @if($section)
        <p class="text-gray-300 mb-8 text-lg">{!! $section->content !!}</p>
    @endif

    {{-- Intégration iframe web-croqueur.fr --}}
    <div class="rounded-xl overflow-hidden border border-gray-700 shadow-2xl" style="height:80vh;">
        <iframe
            src="{{ $pereUrl }}"
            width="100%"
            height="100%"
            frameborder="0"
            class="w-full h-full"
            title="Web Croqueur — Site de mon père">
        </iframe>
    </div>

    <p class="text-center text-gray-500 text-sm mt-4">
        Visiter directement :
        <a href="{{ $pereUrl }}" target="_blank" class="text-purple-400 hover:underline">{{ $pereUrl }}</a>
    </p>
</div>
@endsection
