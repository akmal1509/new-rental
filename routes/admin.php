<?php

use App\Helpers\AppHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
// use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\CarBrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarFeatureController;
use App\Http\Controllers\Admin\RentCarController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatusLogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermissionController;
use App\Models\Menu;



Route::redirect('/', '/admin/dashboard');
// Route::get('/dashboard', [DashboardController::class, 'index']);
Route::group([
    'prefix' => 'general'
], function () {
    Route::controller(GeneralController::class)
        ->group(function () {
            Route::get('/createSlug', 'createSlug');
            Route::get('/checkSlug', 'checkSlug');
            Route::get('/header/log', 'notif');
            Route::post('/header/log/notif', 'upNotif');
        });
});

Route::post('/rent/calculate', [RentCarController::class, 'calculate']);
Route::post('/rent/image-change', [RentCarController::class, 'imageChange']);
Route::post('/rent/info', [RentCarController::class, 'info']);
Route::post('/booking/info', [BookingController::class, 'info']);
Route::get('/user/permission/access/show', [UserPermissionController::class, 'permis']);
Route::get('/user/{id}/changepassword', [UserController::class, 'changePassword']);
Route::post('/user/{id}/changepassword', [UserController::class, 'updatePassword']);
Route::get('/booking/{id}', [BookingController::class, 'show']);

Route::group([
    'prefix' => 'log'
], function () {
    Route::controller(StatusLogController::class)
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
        });
});
// Route::get('/user/permission/access/s', [UserPermissionController::class, 'pusPermis']);

$menu = AppHelper::getRoute();
foreach ($menu as $menu) {
    if ($menu->subMenus->isEmpty()) {
        Route::get('/' .  $menu->slug . '/trashed', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@trashed')->middleware(['can:' . $menu->slug]);
        Route::post('/' . $menu->slug . '/restore', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@restore')->middleware(['can:' . $menu->slug]);
        Route::post('/' . $menu->slug . '/duplicate', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@duplicate')->middleware(['can:' . $menu->slug]);
        Route::post('/' . $menu->slug . '/bulk', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@bulk')->middleware(['can:' . $menu->slug]);
        Route::post('/' . $menu->slug . '/force', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@force')->middleware(['can:' . $menu->slug]);
        Route::resource('/' . $menu->slug, 'App\Http\Controllers\Admin\\' .  $menu->controller)->middleware(['can:' . $menu->slug])->except('show');
    } else {
        foreach ($menu->subMenus as $sub) {
            if ($menu->slug !== $sub->slug) {
                Route::get('/' . $sub->slug . '/trashed', 'App\Http\Controllers\Admin\\' .  $sub->controller . '@trashed')->middleware(['can:' . $sub->slug]);
                Route::post('/' . $sub->slug . '/restore', 'App\Http\Controllers\Admin\\' .  $sub->controller . '@restore')->middleware(['can:' . $sub->slug]);
                Route::post('/' . $sub->slug . '/duplicate', 'App\Http\Controllers\Admin\\' .  $sub->controller . '@duplicate')->middleware(['can:' . $sub->slug]);
                Route::post('/' . $sub->slug . '/bulk', 'App\Http\Controllers\Admin\\' .  $sub->controller . '@bulk')->middleware(['can:' . $sub->slug]);
                Route::post('/' . $sub->slug . '/force', 'App\Http\Controllers\Admin\\' .  $sub->controller . '@force')->middleware(['can:' . $sub->slug]);
                Route::resource('/' . $sub->slug, 'App\Http\Controllers\Admin\\' .  $sub->controller)->middleware(['can:' . $sub->slug])->except('show');
            } else {
                Route::get('/' .  $menu->slug . '/trashed', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@trashed')->middleware(['can:' . $menu->slug]);
                Route::post('/' . $menu->slug . '/restore', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@restore')->middleware(['can:' . $menu->slug]);
                Route::post('/' . $menu->slug . '/duplicate', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@duplicate')->middleware(['can:' . $menu->slug]);
                Route::post('/' . $menu->slug . '/bulk', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@bulk')->middleware(['can:' . $menu->slug]);
                Route::post('/' . $menu->slug . '/force', 'App\Http\Controllers\Admin\\' .  $menu->controller . '@force')->middleware(['can:' . $menu->slug]);
                Route::resource('/' . $menu->slug, 'App\Http\Controllers\Admin\\' .  $menu->controller)->middleware(['can:' . $menu->slug])->except('show');
            }
        };
    }
};
