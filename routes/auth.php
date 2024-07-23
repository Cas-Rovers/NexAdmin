<?php

    use App\Http\Controllers\Admin\DashboardController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register auth routes for your application.
    | all of them will be assigned to the "auth" middleware group.
    | Make something great!
    |
    */

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
