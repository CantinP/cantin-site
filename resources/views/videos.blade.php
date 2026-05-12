@extends('layouts.app')
@section('title', 'Mes Vidéos — Cantin')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-14">
    <h1 class="text-3xl font-bold text-red-400 mb-2">🎬 Mes Vidéos</h1>
    <p class="text-gray-400 mb-8">Les dernières vidéos de mes chaînes YouTube, chargées automatiquement.</p>

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
</div>

<script>
const YT_API_KEY   = "{{ $apiKey }}";
const CHANNEL_MAIN = "{{ $channelId }}";
const CHANNEL_VOD  = "{{ $channelVod }}";
const container    = document.getElementById('youtube-videos');

function setTab(active) {
    ['main','vod'].forEach(t => {
        document.getElementById('tab-'+t).className = t === active
            ? 'px-5 py-2 rounded-xl font-semibold text-sm transition bg-red-600 text-white'
            : 'px-5 py-2 rounded-xl font-semibold text-sm transition bg-gray-800 text-gray-400 hover:bg-gray-700';
    });
}

function loadVideos(type) {
    setTab(type);
    const channelId = type === 'vod' ? CHANNEL_VOD : CHANNEL_MAIN;
    container.innerHTML = '<div class="col-span-full text-center py-10 text-gray-500"><div class="animate-pulse text-4xl mb-3">📺</div><p>Chargement...</p></div>';

    fetch(`https://www.googleapis.com/youtube/v3/search?key=${YT_API_KEY}&channelId=${channelId}&part=snippet,id&order=date&maxResults=9&type=video`)
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

loadVideos('main');
</script>
@endsection
