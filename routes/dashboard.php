<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\SettignsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/all/invoices', [DashboardController::class, 'allInvoice'])->name('all.invoice');
    Route::delete('/delete/invoices/{id}', [DashboardController::class, 'destroy'])->name('delete.invoice');
    Route::GET('/edit/invoices/{id}', [DashboardController::class, 'edit'])->name('edit.invoice');
    Route::GET('/settigns', [SettignsController::class, 'Settign'])->name('settigns');
    Route::GET('/default-setting', [SettignsController::class, 'DefaultSetting'])->name('default.setting');
});
