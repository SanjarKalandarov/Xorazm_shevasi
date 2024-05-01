<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// So'zni yoki gapni olish uchun route
Route::get('words',[\App\Http\Controllers\WordController::class,'words'])->name('words');
Route::middleware('auth')->group(function () {
    Route::get('word/import',[\App\Http\Controllers\ImportController::class,'index'])->name("import");
    Route::post('import',[\App\Http\Controllers\ImportController::class,'import_excel'])->name("import.excel");
//    Route::get('words',[\App\Http\Controllers\WordController::class,'words'])->name('words');
    Route::get('word_create',[\App\Http\Controllers\WordController::class,'word_create'])->name('word_create');
    Route::get('search_create',[\App\Http\Controllers\WordController::class,'search_create'])->name('search_create');
    Route::post('/word_store', [\App\Http\Controllers\WordController::class,'word_store'])->name('word_store');
    Route::get('/get-translation', [\App\Http\Controllers\WordController::class,'get_translation'])->name('get_translation');
    Route::get('/qidiruv', [\App\Http\Controllers\WordController::class,'qidiruv'])->name('qidiruv');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
