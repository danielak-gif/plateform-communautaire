<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunauteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\DB;

Route::get('/db-test', function () {
    return DB::connection()->getPdo() ? "OK DB" : "FAIL";
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $monProfil = App\Models\Profile::where('user_id', auth()->id())->first();
    return view('dashboard', compact('monProfil'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/annuaire', [CommunauteController::class, 'index'])->name('communaute.index');
Route::view('/projet-8', 'projet8')->name('projet8');
Route::view('/project-8', 'projet8');
Route::view('/projet8', 'projet8');
Route::view('/project8', 'projet8');

Route::middleware('auth')->group(function () {
    Route::get('/annuaire/soumettre', [CommunauteController::class, 'create'])->name('communaute.create');
    Route::post('/annuaire/soumettre', [CommunauteController::class, 'store'])->name('communaute.store');
});

Route::get('/annuaire/{profile}', [CommunauteController::class, 'show'])->name('communaute.show');

Route::patch('/admin/profiles/{profile}/approuver', [AdminController::class, 'approuver'])
     ->name('admin.profiles.approuver');

Route::patch('/admin/profiles/{profile}/rejeter', [AdminController::class, 'rejeter'])
     ->name('admin.profiles.rejeter');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminController::class, 'index'])->name('index');
    Route::post('/approuver/{profile}',[AdminController::class, 'approuver'])->name('approuver');
    Route::post('/rejeter/{profile}',[AdminController::class, 'rejeter'])->name('rejeter');
    Route::delete('/supprimer/{profile}',[AdminController::class, 'supprimer'])->name('supprimer');
    Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export-pdf', [AdminController::class, 'exportPdf'])->name('export.pdf');
});

// Routes publiques annonces
Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/annonces/creer', [AnnonceController::class, 'create'])->name('annonces.create');
    Route::post('/annonces/creer', [AnnonceController::class, 'store'])->name('annonces.store');
    Route::delete('/annonces/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');
});

require __DIR__.'/auth.php';
