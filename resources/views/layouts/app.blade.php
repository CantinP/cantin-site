<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Cantin'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-950 text-white min-h-screen flex flex-col">

    <nav class="bg-gray-900 border-b border-purple-700 px-6 py-4 flex items-center justify-between sticky top-0 z-50">
        <a href="{{ route('home') }}" class="text-purple-400 font-bold text-xl tracking-wide hover:text-purple-300">
            🎮 Cantin
        </a>

        <div class="hidden md:flex items-center gap-5 text-sm font-medium">
            <a href="{{ route('home') }}"     class="hover:text-purple-400 transition">Accueil</a>
            <a href="{{ route('about') }}"    class="hover:text-purple-400 transition">À propos</a>
            <a href="{{ route('setup') }}"    class="hover:text-purple-400 transition">Mon Setup</a>
            <a href="{{ route('videos') }}"   class="hover:text-purple-400 transition">Vidéos</a>
            <a href="{{ route('donation') }}" class="hover:text-purple-400 transition">Dons</a>
            <a href="{{ route('pere') }}"     class="hover:text-purple-400 transition">Mon Père</a>
        </div>

        <div class="flex items-center gap-3">
            @foreach($socials ?? [] as $social)
                @if($social->show_in_navbar)
                    <a href="{{ $social->url }}" target="_blank" rel="noopener"
                       class="text-lg hover:scale-110 transition"
                       style="color: {{ $social->color ?? '#fff' }}"
                       title="{{ $social->platform }}">
                        <i class="{{ $social->icon }}"></i>
                    </a>
                @endif
            @endforeach

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="ml-3 bg-purple-600 hover:bg-purple-700 px-3 py-1 rounded text-sm font-semibold transition">Admin</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-gray-400 hover:text-white text-sm ml-2">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white ml-3">Connexion</a>
            @endauth
        </div>
    </nav>

    @if(session('success'))
        <div class="bg-green-700 text-white text-sm px-6 py-2 text-center">{{ session('success') }}</div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 py-6 px-6 text-center text-gray-500 text-sm">
        <div class="flex justify-center gap-4 mb-3">
            @foreach($socials ?? [] as $social)
                @if($social->show_in_footer)
                    <a href="{{ $social->url }}" target="_blank" class="hover:text-white transition"
                       style="color: {{ $social->color ?? '#9ca3af' }}" title="{{ $social->platform }}">
                        <i class="{{ $social->icon }} text-xl"></i>
                    </a>
                @endif
            @endforeach
        </div>
        <p>© {{ date('Y') }} Cantin — Tous droits réservés</p>
    </footer>

</body>
</html>
