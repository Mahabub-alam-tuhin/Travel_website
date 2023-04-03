<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\travelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userRoleController;
use App\Http\Controllers\permisssionController;
use App\Http\Controllers\permitController;
use App\Http\Controllers\spotController;
use App\Http\Controllers\districtController;
use App\Http\Controllers\divisionController;
use App\Http\Controllers\unionController;
use App\Http\Controllers\upazilaController;
use App\Http\Controllers\resort_ManagementController;
use App\Http\Controllers\tour_guideenceController;



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

Route::get('/', [travelController::class, 'index'])->name('home');
Route::get('/about', [travelController::class, 'about'])->name('about');
Route::get('/service', [travelController::class, 'service'])->name('service');
Route::get('/contact', [travelController::class, 'contact'])->name('contact');
Route::get('/tour-packages', [travelController::class, 'tourPackages'])->name('tour-packages');
Route::get('/details/{id}', [travelController::class, 'details'])->name('frontEnd.details.details');
Route::get('/search', [travelController::class, 'search'])->name('frontEnd.search.search');



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
        Route::get('/delete/{id}', [permisssionController::class, 'delete'])->middleware('canDelete')->name('dashboard.permission.delete');
    });

    Route::prefix('permit')->middleware(['auth'])->group(function () {
        Route::get('/create', [permitController::class, 'create'])->name('dashboard.permit.create');
        Route::post('/store', [permitController::class, 'store'])->name('dashboard.permit.store');
    });

    Route::prefix('spot')->group(function () {
        Route::get('/create', [spotController::class, 'create'])->name('admin.spot.create');
        Route::post('/saveSpot', [spotController::class, 'saveSpot'])->name('admin.spot.saveSpot');
        Route::get('/view', [spotController::class, 'view'])->name('admin.spot.view');
        Route::get('/edit/{id}', [spotController::class, 'edit'])->name('admin.spot.edit');
        Route::post('/update/{id}', [spotController::class, 'update'])->name('admin.spot.update');
        Route::get('/delete/{id}', [spotController::class, 'delete'])->name('admin.spot.delete');
    });

    Route::prefix('district')->group(function () {
        Route::post('/district-by-division', [districtController::class, 'district_by_division']);
        Route::get('/create', [districtController::class, 'create'])->name('admin.district.create');
        Route::post('/savedistrict', [districtController::class, 'savedistrict'])->name('admin.district.savedistrict');
        Route::get('/view', [districtController::class, 'view'])->name('admin.district.view');
        Route::get('/edit/{id}', [districtController::class, 'edit'])->name('admin.district.edit');
        Route::post('/update/{id}', [districtController::class, 'update'])->name('admin.district.update');
        Route::get('/delete/{id}', [districtController::class, 'delete'])->name('admin.district.delete');
    });

    Route::prefix('division')->group(function () {

        Route::get('/create', [divisionController::class, 'create'])->name('admin.division.create');
        Route::post('/savedivision', [divisionController::class, 'savedivision'])->name('admin.division.savedivision');
        Route::get('/view', [divisionController::class, 'view'])->name('admin.division.view');
        Route::get('/edit/{id}', [divisionController::class, 'edit'])->name('admin.division.edit');
        Route::post('/update/{id}', [divisionController::class, 'update'])->name('admin.division.update');
        Route::get('/delete/{id}', [divisionController::class, 'delete'])->name('admin.division.delete');
    });

    Route::prefix('union')->group(function () {
        Route::post('/union_by_upazila', [unionController::class, 'union_by_upazila']);
        Route::get('/create', [unionController::class, 'create'])->name('admin.union.create');
        Route::post('/saveunion', [unionController::class, 'saveunion'])->name('admin.union.saveunion');
        Route::get('/view', [unionController::class, 'view'])->name('admin.union.view');
        Route::get('/edit/{id}', [unionController::class, 'edit'])->name('admin.union.edit');
        Route::post('/update/{id}', [unionController::class, 'update'])->name('admin.union.update');
        Route::get('/delete/{id}', [unionController::class, 'delete'])->name('admin.union.delete');
    });
    Route::prefix('upazila')->group(function () {
        Route::post('/upazila_by_district', [upazilaController::class, 'upazila_by_district']);
        Route::get('/create', [upazilaController::class, 'create'])->name('admin.upazila.create');
        Route::post('/saveupazila', [upazilaController::class, 'saveupazila'])->name('admin.upazila.saveupazila');
        Route::get('/view', [upazilaController::class, 'view'])->name('admin.upazila.view');
        Route::get('/edit/{id}', [upazilaController::class, 'edit'])->name('admin.upazila.edit');
        Route::post('/update/{id}', [upazilaController::class, 'update'])->name('admin.upazila.update');
        Route::get('/delete/{id}', [upazilaController::class, 'delete'])->name('admin.upazila.delete');
    });

    Route::prefix('resort_Management')->group(function () {
        Route::get('/create', [resort_ManagementController::class, 'create'])->name('admin.resort_Management.create');
        Route::post('/saveresort', [resort_ManagementController::class, 'saveresort'])->name('admin.resort_Management.saveresort');
        Route::get('/view', [resort_ManagementController::class, 'view'])->name('admin.resort_Management.view');
        Route::get('/edit/{id}', [resort_ManagementController::class, 'edit'])->name('admin.resort_Management.edit');
        Route::post('/upadte/{id}', [resort_ManagementController::class, 'upadte'])->name('admin.resort_Management.upadte');
        Route::get('/delete/{id}', [resort_ManagementController::class, 'delete'])->name('admin.resort_Management.delete');
        Route::get('/upload', [resort_ManagementController::class, 'upload'])->name('admin.resort_Management.upload');
    });

    Route::prefix('tour_guideence')->group(function () {
        Route::get('/create', [tour_guideenceController::class, 'create'])->name('admin.tour_guideence.create');
        Route::post('/saveguide', [tour_guideenceController::class, 'saveguide'])->name('admin.tour_guideence.saveguide');
        Route::get('/view', [tour_guideenceController::class, 'view'])->name('admin.tour_guideence.view');
        Route::get('/edit/{id}', [tour_guideenceController::class, 'edit'])->name('admin.tour_guideence.edit');
        Route::post('/update/{id}', [tour_guideenceController::class, 'update'])->name('admin.tour_guideence.update');
        Route::get('/delete/{id}', [tour_guideenceController::class, 'delete'])->name('admin.tour_guideence.delete');

    });

});
