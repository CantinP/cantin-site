@extends('layouts.app')
@section('title', 'Dons — Cantin')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-16 text-center">
    <h1 class="text-3xl font-bold text-yellow-400 mb-2">❤️ Me Soutenir</h1>

    @if($section)
        <p class="text-gray-300 mb-10 text-lg">{!! $section->content !!}</p>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">

        {{-- Ko-fi --}}
        <a href="{{ $kofi }}" target="_blank" rel="noopener"
           class="block bg-[#FF5E5B] hover:bg-[#e54e4b] text-white rounded-2xl p-8 transition hover:scale-105 shadow-lg">
            <div class="text-5xl mb-3">☕</div>
            <div class="text-xl font-bold">Ko-fi</div>
            <p class="text-sm mt-1 opacity-80">ko-fi.com/cantin</p>
            <p class="text-xs mt-2 opacity-60">Don unique ou mensuel</p>
        </a>

        {{-- Tipeeestream --}}
        <a href="{{ $tipeee }}" target="_blank" rel="noopener"
           class="block bg-[#f9a825] hover:bg-[#e09b20] text-black rounded-2xl p-8 transition hover:scale-105 shadow-lg">
            <div class="text-5xl mb-3">🎉</div>
            <div class="text-xl font-bold">Tipeeestream</div>
            <p class="text-sm mt-1 opacity-70">tipeeestream.com/cantin</p>
            <p class="text-xs mt-2 opacity-50">Soutien récurrent ou one-shot</p>
        </a>
    </div>

    <p class="text-gray-500 text-sm">Tout don est entièrement facultatif. Merci du fond du cœur ! 🙏</p>
</div>
@endsection
