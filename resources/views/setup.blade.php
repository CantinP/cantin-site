@extends('layouts.app')
@section('title', 'Mon Setup — Cantin')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-14">

    <h1 class="text-3xl font-bold text-purple-400 mb-2">🖥️ Mon Setup</h1>
    <p class="text-gray-400 mb-10">Tout le matériel que j'utilise pour streamer.</p>

    @forelse($items as $category => $categoryItems)
        <section class="mb-14">
            <div class="flex items-center gap-4 mb-6">
                <span class="text-purple-400 text-2xl">
                    @switch($category)
                        @case('PC') 💻 @break
                        @case('Audio') 🎙️ @break
                        @case('Streaming') 📡 @break
                        @case('Périphériques') ⌨️ @break
                        @default 📦
                    @endswitch
                </span>
                <h2 class="text-xl font-bold text-white border-b border-purple-700 pb-2 flex-1 uppercase tracking-widest">{{ $category }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                @foreach($categoryItems as $item)
                    <div class="bg-gray-900 rounded-2xl border border-gray-800 overflow-hidden hover:border-purple-600 hover:shadow-lg hover:shadow-purple-950/30 transition-all group">
                        @if($item->image_path)
                            <div class="w-full h-44 bg-gray-800 flex items-center justify-center p-4 overflow-hidden">
                                <img src="{{ $item->image_path }}" alt="{{ $item->name }}"
                                     class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                                     onerror="this.parentElement.innerHTML='<span style=\'font-size:3rem\'>📦</span>'">
                            </div>
                        @else
                            <div class="w-full h-44 bg-gray-800 flex items-center justify-center text-5xl">📦</div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-white mb-1">{{ $item->name }}</h3>
                            @if($item->description)
                                <p class="text-gray-400 text-sm mb-3 leading-5">{{ $item->description }}</p>
                            @endif
                            @if($item->price)
                                <span class="text-purple-400 font-bold text-sm">{{ number_format($item->price, 2) }} €</span>
                            @endif
                            @if($item->affiliate_url)
                                <a href="{{ $item->affiliate_url }}" target="_blank"
                                   class="block mt-3 text-center bg-purple-700 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded-xl transition">
                                    Voir le produit ↗
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @empty
        <p class="text-gray-500">Aucun équipement renseigné pour l'instant.</p>
    @endforelse
</div>
@endsection
