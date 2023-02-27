<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\travelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userRoleController;
use App\Http\Controllers\permisssionController;
use App\Http\Controllers\permitController;



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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/test', function () {
    return dd(\App\Models\User::with("roles")->get()->toArray());
});

Route::get('/data', function () {
    return dd(\App\Models\permission::with("permissions")->get()->toArray());
});

Route::get('/', [travelController::class, 'index'])->name('');
Route::get('/about', [travelController::class, 'index'])->name('about');
Route::get('/service', [travelController::class, 'index'])->name('service');
Route::get('/contact', [travelController::class, 'index'])->name('contact');
Route::get('/tour-packages', [travelController::class, 'tourPackages'])->name('tour-packages');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //    Route::get('/dashboard', function () {
    //        return view('dashboard');
    //    })->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/user-roles', [UserController::class, 'index'])->name('dashboard.user-roles');
    Route::post('/dashboard/saveUser', [UserController::class, 'saveUser'])->name('dashboard.saveUser');
    Route::get('/dashboard/showUser', [UserController::class, 'showUser'])->name('dashboard.showUser');
    Route::get('/dashboard/edit-user/{id}', [UserController::class, 'edit'])->name('dashboard.edit-User');
    Route::post('/dashboard/update-user/{id}', [UserController::class, 'update'])->name('dashboard.update-User');
    Route::get('/dashboard/delete-user/{id}', [UserController::class, 'delete'])->name('dashboard.delete-User');
    Route::get('/dashboard/details-user/{id}', [UserController::class, 'details'])->name('dashboard.details-User');

    Route::prefix('role_menu')->group(function () {
        Route::get('/create', [roleController::class, 'create'])->name('dashboard.create');
        Route::post('/saveRole', [roleController::class, 'saveRole'])->name('dashboard.saveRole');
        Route::get('/view', [roleController::class, 'view'])->name('dashboard.view');
        Route::get('/edit/{id}', [roleController::class, 'edit'])->name('dashboard.edit');
        Route::post('/update/{id}', [roleController::class, 'update'])->name('dashboard.update');
        Route::get('/delete/{id}', [roleController::class, 'delete'])->name('dashboard.delete');
    });

    Route::prefix('user_role')->group(function () {
        Route::get('/roll_assign', [userRoleController::class, 'roll_assign'])->name('dashboard.roll_assign');
        Route::post('store', [userRoleController::class, 'store'])->name('dashboard.store');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/create', [permisssionController::class, 'create'])->middleware('canCreate')->name('dashboard.permission.create');
        Route::post('/savePermission', [permisssionController::class, 'savePermission'])->name('dashboard.permission.savePermission');
        Route::get('/view', [permisssionController::class, 'view'])->name('dashboard.permission.view');
        Route::get('/edit/{id}', [permisssionController::class, 'edit'])->middleware('canEdit')->name('dashboard.permission.edit');
        Route::post('/update/{id}', [permisssionController::class, 'update'])->name('dashboard.permission.update');
        Route::get('/delete/{id}', [permisssionController::class, 'delete'])->name('dashboard.permission.delete');
    });

        Route::prefix('permit')->middleware(['auth'])->group(function () {
        Route::get('/create', [permitController::class, 'create'])->name('dashboard.permit.create');
        Route::post('/store', [permitController::class, 'store'])->name('dashboard.permit.store');
    });
});
