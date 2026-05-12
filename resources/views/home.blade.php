@extends('layouts.app')
@section('title', 'Cantin — Accueil')
@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Intro --}}
    @php $intro = \App\Models\Section::getBySlug('home_intro'); @endphp
    @if($intro)
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-purple-400 mb-2">{{ $intro->title }}</h1>
            <p class="text-gray-300 text-lg">{!! $intro->content !!}</p>
        </div>
    @endif

    {{-- Player + Chat Twitch côte à côte --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-12">

        {{-- Player --}}
        <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg border border-purple-800">
            <iframe
                src="https://player.twitch.tv/?channel={{ $twitchChannel }}&parent={{ request()->getHost() }}"
                height="480"
                width="100%"
                allowfullscreen
                frameborder="0"
                class="w-full">
            </iframe>
        </div>

        {{-- Chat --}}
        <div class="rounded-xl overflow-hidden shadow-lg border border-purple-800">
            <iframe
                src="https://www.twitch.tv/embed/{{ $twitchChannel }}/chat?parent={{ request()->getHost() }}&darkpopout"
                height="480"
                width="100%"
                frameborder="0"
                class="w-full">
            </iframe>
        </div>
    </div>

    {{-- Liens rapides --}}
    <div class="flex flex-wrap justify-center gap-4">
        <a href="{{ route('setup') }}"    class="bg-purple-700 hover:bg-purple-600 px-6 py-3 rounded-xl font-semibold transition">🖥️ Mon Setup</a>
        <a href="{{ route('donation') }}" class="bg-yellow-500 hover:bg-yellow-400 text-black px-6 py-3 rounded-xl font-semibold transition">❤️ Me soutenir</a>
        <a href="{{ route('pere') }}"     class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl font-semibold transition">👨 Mon Père</a>
    </div>

</div>
@endsection
