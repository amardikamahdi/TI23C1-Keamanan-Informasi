<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Encrypt\Text\ResourceController as EncryptTextResourceController;
use App\Http\Controllers\Encrypt\Text\ListController as EncryptTextListController;
use App\Http\Controllers\Encrypt\Text\DownloadController as EncryptTextDownloadController;
use App\Http\Controllers\Encrypt\Text\HourlySeriesChartController as EncryptTextHourlySeriesChartController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('encrypt')->name('encrypt.')->group(function () {
    Route::prefix('text')->name('text.')->group(function () {
        Route::get('list', EncryptTextListController::class)->name('list');
        Route::get('hourly-series-chart', EncryptTextHourlySeriesChartController::class)->name('hourly-series-chart');

        Route::get('create', [EncryptTextResourceController::class, 'create'])->name('create');
        Route::post('', [EncryptTextResourceController::class, 'store'])->name('store');
        Route::post('{encryptText}', EncryptTextDownloadController::class)->name('download');
    });
});
