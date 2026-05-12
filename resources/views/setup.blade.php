@extends('layouts.app')
@section('title', 'Mon Setup — Cantin')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-purple-400 mb-2">🖥️ Mon Setup</h1>
    <p class="text-gray-400 mb-8">Tout le matériel que j'utilise pour streamer.</p>

    @forelse($items as $category => $categoryItems)
        <section class="mb-12">
            <h2 class="text-xl font-bold text-white border-b border-purple-700 pb-2 mb-6 uppercase tracking-widest">
                {{ $category }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($categoryItems as $item)
                    <div class="bg-gray-900 rounded-xl border border-gray-800 overflow-hidden hover:border-purple-600 transition group">
                        @if($item->image_path)
                            <img src="{{ Storage::url($item->image_path) }}"
                                 alt="{{ $item->name }}"
                                 class="w-full h-48 object-contain bg-gray-800 p-4">
                        @else
                            <div class="w-full h-48 bg-gray-800 flex items-center justify-center text-5xl">📦</div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-white mb-1">{{ $item->name }}</h3>
                            @if($item->description)
                                <p class="text-gray-400 text-sm mb-2">{{ $item->description }}</p>
                            @endif
                            @if($item->price)
                                <span class="text-purple-400 font-bold text-sm">{{ number_format($item->price, 2) }} €</span>
                            @endif
                            @if($item->affiliate_url)
                                <a href="{{ $item->affiliate_url }}" target="_blank"
                                   class="block mt-3 text-center bg-purple-700 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded-lg transition">
                                    Voir le produit
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
