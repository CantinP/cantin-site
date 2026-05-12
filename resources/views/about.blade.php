@extends('layouts.app')
@section('title', 'À propos — Cantin')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold text-purple-400 mb-2">👋 Qui suis-je ?</h1>
    <p class="text-gray-500 mb-10 text-sm uppercase tracking-widest">À propos de Cantin</p>

    @if($section)
        <div class="rounded-3xl border border-purple-900/50 bg-gray-900/70 p-8 lg:p-12 shadow-2xl shadow-purple-950/20">
            <h2 class="text-2xl font-bold text-white mb-6">{{ $section->title }}</h2>
            <div class="text-gray-300 text-lg leading-9 whitespace-pre-line">{{ $section->content }}</div>
        </div>
    @else
        <p class="text-gray-500">Section en cours de rédaction...</p>
    @endif
</div>
@endsection
