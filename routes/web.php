<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WhyUsItemController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\BrochureController;
use App\Http\Controllers\Admin\FaqController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-submit', [HomeController::class, 'submitContact'])->name('contact.submit');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Messages Inbox
    Route::get('/messages', [DashboardController::class, 'messages'])->name('messages.index');
    Route::post('/messages/{id}/toggle-read', [DashboardController::class, 'toggleMessageRead'])->name('messages.toggle-read');
    Route::delete('/messages/{id}', [DashboardController::class, 'deleteMessage'])->name('messages.delete');

    // Site Settings Config
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Why Us Items CRUD
    Route::resource('why-us', WhyUsItemController::class)->except(['show']);

    // Programs CRUD
    Route::resource('programs', ProgramController::class)->except(['show']);

    // Brochures CRUD
    Route::resource('brochures', BrochureController::class)->except(['show']);

    // FAQs CRUD
    Route::resource('faqs', FaqController::class)->except(['show']);
});
