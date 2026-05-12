@extends('layouts.admin')
@section('title', 'Modifier : ' . $setting->label)
@section('content')
<div class="max-w-xl">
    <form action="{{ route('admin.settings.update', $setting) }}" method="POST" class="admin-form">
        @csrf @method('PUT')
        <label class="block text-gray-400 text-sm mb-1">{{ $setting->label }}</label>
        @if($setting->type === 'html')
            <textarea name="value" rows="10" class="admin-input">{{ $setting->value }}</textarea>
        @else
            <input type="text" name="value" value="{{ $setting->value }}" class="admin-input">
        @endif
        <div class="mt-4 flex gap-3">
            <button class="btn-primary">Sauvegarder</button>
            <a href="{{ route('admin.settings.index') }}" class="btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
