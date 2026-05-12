@extends('layouts.app')
@section('title', 'Mon Setup — Cantin')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-14">

    {{-- Bio ──────────────────────────────────────────────────────── --}}
    @php $about = \App\Models\Section::getBySlug('about'); @endphp
    @if($about)
        <section class="mb-16 rounded-3xl border border-purple-900/50 bg-gray-900/70 p-8 lg:p-12 shadow-2xl shadow-purple-950/20">
            <h2 class="text-3xl font-bold text-purple-400 mb-6">👋 {{ $about->title }}</h2>
            <div class="text-gray-300 text-lg leading-8 whitespace-pre-line">{{ $about->content }}</div>
        </section>
    @endif

    {{-- Setup ────────────────────────────────────────────────────── --}}
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
                                     onerror="this.parentElement.innerHTML='<span class=\'text-5xl\'>📦</span>'">
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

    {{-- Vidéos YouTube ─────────────────────────────────────────────── --}}
    <section id="videos" class="mt-16">
        <h2 class="text-3xl font-bold text-red-400 mb-2">🎬 Mes Dernières Vidéos</h2>
        <p class="text-gray-400 mb-6">Les dernières vidéos de mes chaînes YouTube, mises à jour automatiquement.</p>

        {{-- Onglets --}}
        <div class="flex gap-3 mb-8">
            <button onclick="loadVideos('main')" id="tab-main"
                    class="px-5 py-2 rounded-xl font-semibold text-sm transition bg-red-600 text-white">
                📺 Cantin
            </button>
            <button onclick="loadVideos('vod')" id="tab-vod"
                    class="px-5 py-2 rounded-xl font-semibold text-sm transition bg-gray-800 text-gray-400 hover:bg-gray-700">
                📼 Cantin VOD
            </button>
        </div>

        <div id="youtube-videos" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="col-span-full text-center py-10 text-gray-500">
                <div class="animate-pulse text-4xl mb-3">📺</div>
                <p>Chargement des vidéos...</p>
            </div>
        </div>
    </section>
</div>

<script>
const YT_API_KEY   = "{{ \App\Models\SiteSetting::get('youtube_api_key') }}";
const CHANNEL_MAIN = "{{ \App\Models\SiteSetting::get('youtube_channel_id') }}";
const CHANNEL_VOD  = "{{ \App\Models\SiteSetting::get('youtube_vod_channel_id') }}";
const container    = document.getElementById('youtube-videos');

function setTab(active) {
    ['main','vod'].forEach(t => {
        const btn = document.getElementById('tab-'+t);
        btn.className = t === active
            ? 'px-5 py-2 rounded-xl font-semibold text-sm transition bg-red-600 text-white'
            : 'px-5 py-2 rounded-xl font-semibold text-sm transition bg-gray-800 text-gray-400 hover:bg-gray-700';
    });
}

function loadVideos(type) {
    setTab(type);
    const channelId = type === 'vod' ? CHANNEL_VOD : CHANNEL_MAIN;
    container.innerHTML = '<div class="col-span-full text-center py-10 text-gray-500"><div class="animate-pulse text-4xl mb-3">📺</div><p>Chargement...</p></div>';

    fetch(`https://www.googleapis.com/youtube/v3/search?key=${YT_API_KEY}&channelId=${channelId}&part=snippet,id&order=date&maxResults=6&type=video`)
        .then(r => r.json())
        .then(data => {
            if (!data.items || data.items.length === 0) {
                container.innerHTML = '<div class="col-span-full text-center text-gray-500 py-10">Aucune vidéo trouvée.</div>';
                return;
            }
            container.innerHTML = data.items.map(item => {
                const vid   = item.id.videoId;
                const title = item.snippet.title;
                const thumb = item.snippet.thumbnails.medium.url;
                const date  = new Date(item.snippet.publishedAt).toLocaleDateString('fr-FR');
                return `<a href="https://www.youtube.com/watch?v=${vid}" target="_blank" rel="noopener"
                           class="group block bg-gray-900 rounded-2xl border border-gray-800 overflow-hidden hover:border-red-600 hover:shadow-lg hover:shadow-red-950/30 transition-all">
                            <div class="relative overflow-hidden">
                                <img src="${thumb}" alt="${title}" class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition bg-black/50">
                                    <span class="text-5xl">▶️</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-white text-sm leading-5 line-clamp-2 mb-2">${title}</h3>
                                <span class="text-gray-500 text-xs">${date}</span>
                            </div>
                        </a>`;
            }).join('');
        })
        .catch(() => {
            container.innerHTML = '<div class="col-span-full text-center text-gray-500 py-10">Impossible de charger les vidéos.</div>';
        });
}

// Charge la chaîne principale au démarrage
loadVideos('main');
</script>
@endsection
