<?php

    use App\Http\Controllers\Frontend\HomeController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application.
    | all of them will be assigned to the "web" middleware group.
    | Make something great!
    |
    */

    Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

    require __DIR__ . '/auth.php';
