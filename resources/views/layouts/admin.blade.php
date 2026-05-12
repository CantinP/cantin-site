<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-white min-h-screen">
    <div class="min-h-screen lg:grid lg:grid-cols-[280px_1fr]">
        <aside class="bg-slate-900/95 border-r border-slate-800 lg:min-h-screen">
            <div class="px-6 py-6 border-b border-slate-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-fuchsia-600 to-violet-700 flex items-center justify-center text-xl shadow-lg shadow-fuchsia-900/30">🎮</div>
                    <div>
                        <div class="font-bold text-lg text-fuchsia-300">Admin Cantin</div>
                        <div class="text-xs text-slate-400">Gestion complète du site</div>
                    </div>
                </a>
            </div>

            <div class="px-4 py-5 space-y-8">
                <div>
                    <p class="admin-sidebar-title">Navigation</p>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'admin-nav-link-active' : '' }}"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
                        <a href="{{ route('admin.settings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'admin-nav-link-active' : '' }}"><i class="fa-solid fa-sliders"></i><span>Paramètres</span></a>
                        <a href="{{ route('admin.sections.index') }}" class="admin-nav-link {{ request()->routeIs('admin.sections.*') ? 'admin-nav-link-active' : '' }}"><i class="fa-solid fa-file-lines"></i><span>Sections</span></a>
                        <a href="{{ route('admin.setup-items.index') }}" class="admin-nav-link {{ request()->routeIs('admin.setup-items.*') ? 'admin-nav-link-active' : '' }}"><i class="fa-solid fa-desktop"></i><span>Setup</span></a>
                        <a href="{{ route('admin.social-links.index') }}" class="admin-nav-link {{ request()->routeIs('admin.social-links.*') ? 'admin-nav-link-active' : '' }}"><i class="fa-solid fa-share-nodes"></i><span>Réseaux</span></a>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-800 bg-slate-900/80 p-4">
                    <p class="text-sm font-semibold text-white mb-1">Conseil</p>
                    <p class="text-xs text-slate-400 leading-5">Tous les formulaires affichent maintenant les valeurs existantes pour éviter d'écraser un contenu déjà en place.</p>
                </div>
            </div>

            <div class="px-4 pb-6 flex gap-3">
                <a href="{{ route('home') }}" class="btn-secondary w-full text-center">Voir le site</a>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button class="btn-danger w-full">Déconnexion</button>
                </form>
            </div>
        </aside>

        <div class="min-w-0">
            <header class="sticky top-0 z-30 backdrop-blur bg-slate-950/80 border-b border-slate-800 px-6 lg:px-10 py-5 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white">@yield('title', 'Dashboard')</h1>
                    <p class="text-sm text-slate-400">Modifie le contenu du site sans toucher au code.</p>
                </div>
                <div class="hidden md:flex items-center gap-3 text-sm text-slate-400">
                    <span class="px-3 py-1 rounded-full border border-slate-700 bg-slate-900">{{ auth()->user()->email ?? 'admin' }}</span>
                </div>
            </header>

            <main class="p-6 lg:p-10 space-y-6">
                @if(session('success'))
                    <div class="rounded-2xl border border-emerald-700/50 bg-emerald-950/60 px-5 py-4 text-emerald-200 text-sm shadow-lg shadow-emerald-950/20">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="rounded-2xl border border-red-700/50 bg-red-950/60 px-5 py-4 text-red-200 text-sm">
                        <p class="font-semibold mb-2">Des champs doivent être corrigés :</p>
                        <ul class="list-disc ml-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
