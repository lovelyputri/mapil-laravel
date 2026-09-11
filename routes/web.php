<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudayaController;

/*
|--------------------------------------------------------------------------
| BUDAYA OSING
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('budaya.dashboard');
});

Route::prefix('budaya')->name('budaya.')->group(function () {

    // Dashboard
    Route::get('/', [BudayaController::class, 'dashboard'])
        ->name('dashboard');

    // =========================================================
    // KAMUS OSING
    // =========================================================

    Route::get('/kamus', [BudayaController::class, 'kamusIndex'])
        ->name('kamus.index');

    Route::get('/kamus/create', [BudayaController::class, 'kamusCreate'])
        ->name('kamus.create');

    Route::post('/kamus', [BudayaController::class, 'kamusStore'])
        ->name('kamus.store');

    Route::get('/kamus/{id}', [BudayaController::class, 'kamusShow'])
        ->name('kamus.show');

    Route::get('/kamus/{id}/edit', [BudayaController::class, 'kamusEdit'])
        ->name('kamus.edit');

    Route::put('/kamus/{id}', [BudayaController::class, 'kamusUpdate'])
        ->name('kamus.update');

    Route::delete('/kamus/{id}', [BudayaController::class, 'kamusDestroy'])
        ->name('kamus.destroy');


    // =========================================================
    // RUMAH ADAT
    // =========================================================

    Route::get('/rumah-adat', [BudayaController::class, 'rumahAdatIndex'])
        ->name('rumah.index');

    Route::get('/rumah-adat/create', [BudayaController::class, 'rumahAdatCreate'])
        ->name('rumah.create');

    Route::post('/rumah-adat', [BudayaController::class, 'rumahAdatStore'])
        ->name('rumah.store');

    Route::get('/rumah-adat/{id}', [BudayaController::class, 'rumahAdatShow'])
        ->name('rumah.show');

    Route::get('/rumah-adat/{id}/edit', [BudayaController::class, 'rumahAdatEdit'])
        ->name('rumah.edit');

    Route::put('/rumah-adat/{id}', [BudayaController::class, 'rumahAdatUpdate'])
        ->name('rumah.update');

    Route::delete('/rumah-adat/{id}', [BudayaController::class, 'rumahAdatDestroy'])
        ->name('rumah.destroy');


    // =========================================================
    // TRADISI & KESENIAN
    // =========================================================

    Route::get('/tradisi', [BudayaController::class, 'tradisiIndex'])
        ->name('tradisi.index');

    Route::get('/tradisi/create', [BudayaController::class, 'tradisiCreate'])
        ->name('tradisi.create');

    Route::post('/tradisi', [BudayaController::class, 'tradisiStore'])
        ->name('tradisi.store');

    Route::get('/tradisi/{id}', [BudayaController::class, 'tradisiShow'])
        ->name('tradisi.show');

    Route::get('/tradisi/{id}/edit', [BudayaController::class, 'tradisiEdit'])
        ->name('tradisi.edit');

    Route::put('/tradisi/{id}', [BudayaController::class, 'tradisiUpdate'])
        ->name('tradisi.update');

    Route::delete('/tradisi/{id}', [BudayaController::class, 'tradisiDestroy'])
        ->name('tradisi.destroy');


    // =========================================================
    // KULINER
    // =========================================================

    Route::get('/kuliner', [BudayaController::class, 'kulinerIndex'])
        ->name('kuliner.index');

    Route::get('/kuliner/create', [BudayaController::class, 'kulinerCreate'])
        ->name('kuliner.create');

    Route::post('/kuliner', [BudayaController::class, 'kulinerStore'])
        ->name('kuliner.store');

    Route::get('/kuliner/{id}', [BudayaController::class, 'kulinerShow'])
        ->name('kuliner.show');

    Route::get('/kuliner/{id}/edit', [BudayaController::class, 'kulinerEdit'])
        ->name('kuliner.edit');

    Route::put('/kuliner/{id}', [BudayaController::class, 'kulinerUpdate'])
        ->name('kuliner.update');

    Route::delete('/kuliner/{id}', [BudayaController::class, 'kulinerDestroy'])
        ->name('kuliner.destroy');


    // =========================================================
    // KUIS
    // =========================================================

    Route::get('/kuis', [BudayaController::class, 'kuis'])
        ->name('kuis');

    Route::post('/kuis/hasil', [BudayaController::class, 'kuisHasil'])
        ->name('kuis.hasil');

});
