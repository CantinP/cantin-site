<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-950 text-white min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 border-r border-gray-800 flex flex-col min-h-screen fixed">
        <div class="px-6 py-5 border-b border-gray-800">
            <span class="font-bold text-purple-400 text-lg">⚙️ Admin Cantin</span>
        </div>
        <nav class="flex-1 px-4 py-6 flex flex-col gap-1 text-sm">
            <a href="{{ route('admin.dashboard') }}"         class="admin-link">📊 Dashboard</a>
            <a href="{{ route('admin.settings.index') }}"   class="admin-link">🔧 Paramètres</a>
            <a href="{{ route('admin.sections.index') }}"   class="admin-link">📝 Sections</a>
            <a href="{{ route('admin.setup-items.index') }}" class="admin-link">🖥️ Setup</a>
            <a href="{{ route('admin.social-links.index') }}" class="admin-link">🌐 Réseaux</a>
        </nav>
        <div class="px-4 py-4 border-t border-gray-800">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-white text-sm">← Voir le site</a>
        </div>
    </aside>

    {{-- Main --}}
    <div class="ml-64 flex-1 flex flex-col min-h-screen">
        <header class="bg-gray-900 border-b border-gray-800 px-8 py-4 flex items-center justify-between">
            <h1 class="text-lg font-semibold">@yield('title', 'Dashboard')</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-gray-400 hover:text-white text-sm">Déconnexion</button>
            </form>
        </header>

        @if(session('success'))
            <div class="bg-green-700 text-white text-sm px-8 py-2">✅ {{ session('success') }}</div>
        @endif

        <main class="flex-1 px-8 py-8">
            @yield('content')
        </main>
    </div>

</body>
</html>

<style>
.admin-link {
    @apply block px-4 py-2 rounded-lg hover:bg-gray-800 hover:text-purple-400 transition font-medium;
}
</style>
