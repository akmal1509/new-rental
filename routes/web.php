<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::redirect('/', '/dashboard-general-dashboard');
Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/rent', [HomeController::class, 'rent']);
Route::get('/about', [HomeController::class, 'aboutUs']);
Route::get('/service', [HomeController::class, 'services']);
Route::get('/booking', [HomeController::class, 'booking']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/booking', [HomeController::class, 'bookingStore']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blog/single', [HomeController::class, 'singleBlog']);
Route::get('/rent/{slug}', [HomeController::class, 'singleRent']);
Route::post('/send-email-contact', [HomeController::class, 'sendContact']);
// Route::get('/rent/single', [HomeController::class, 'singleRent']);

Route::get('/test', function () {
    return view('tmp.pages.bootstrap-modal', ['type_menu' => 'forms']);
});

Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/mejakami', 'index')->middleware('guest')->name('login');
        Route::post('/mejakami', 'authenticate');
        Route::post('/logout', 'logout');
    });

Route::prefix('admin')
    ->middleware('auth')
    ->group(__DIR__ . '/admin.php');
