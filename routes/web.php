<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PereController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SetupItemController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SiteSettingController;

// ── Public routes ──────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/setup', [SetupController::class, 'index'])->name('setup');
Route::get('/reseaux', [SocialController::class, 'index'])->name('socials');
Route::get('/dons', [DonationController::class, 'index'])->name('donation');
Route::get('/mon-pere', [PereController::class, 'index'])->name('pere');

// ── Auth routes (généré par Breeze — ne pas supprimer après installation) ──
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}

// ── Admin routes ───────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('settings', SiteSettingController::class)->only(['index', 'edit', 'update']);
    Route::resource('sections', SectionController::class);
    Route::resource('setup-items', SetupItemController::class);
    Route::resource('social-links', SocialLinkController::class);
});
