@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
        <div class="text-4xl font-bold text-purple-400">{{ $setupCount }}</div>
        <div class="text-gray-400 mt-1">Éléments Setup</div>
    </div>
    <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
        <div class="text-4xl font-bold text-blue-400">{{ $socialCount }}</div>
        <div class="text-gray-400 mt-1">Réseaux sociaux</div>
    </div>
    <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
        <div class="text-4xl font-bold text-yellow-400">{{ $settingCount }}</div>
        <div class="text-gray-400 mt-1">Paramètres</div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <a href="{{ route('admin.settings.index') }}"    class="admin-card">🔧 Paramètres généraux</a>
    <a href="{{ route('admin.sections.index') }}"    class="admin-card">📝 Sections de contenu</a>
    <a href="{{ route('admin.setup-items.index') }}" class="admin-card">🖥️ Mon Setup</a>
    <a href="{{ route('admin.social-links.index') }}" class="admin-card">🌐 Réseaux sociaux</a>
</div>

<style>
.admin-card {
    @apply block bg-gray-900 hover:bg-gray-800 border border-gray-800 hover:border-purple-600
           rounded-xl px-6 py-8 text-center font-semibold transition text-lg;
}
</style>
@endsection
