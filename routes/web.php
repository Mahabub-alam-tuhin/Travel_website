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
use App\Http\Controllers\commentController;
use App\Http\Controllers\comment_replyController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\show_bookingController;
use App\Http\Controllers\carouselController;
use App\Http\Controllers\destinationController;
use App\Http\Controllers\incomeController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registercontroller;

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


Route::prefix ('login')->group(function(){
    Route::get('/register',[loginController::class,'login'])->name('frontEnd.login.login');
    Route::post('/store', [loginController::class, 'store'])->name('frontEnd.login.store');
});
Route::prefix ('register')->group(function(){
    Route::get('/login', [registercontroller::class, 'register'])->name('frontEnd.register.register');
});
Route::prefix ('booking')->group(function(){
    Route::get('/create/{id}',[bookingController::class,'create'])->name('frontEnd.booking.create')->middleware('isadmin');
    Route::post('/saveBooking', [bookingController::class, 'saveBooking'])->name('frontEnd.booking.saveBooking')->middleware('isadmin');

});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //    Route::get('/dashboard', function () {
    //        return view('dashboard');
    //    })->name('dashboard');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('issuperadmin');
    Route::get('/dashboard/user-roles', [UserController::class, 'index'])->name('dashboard.user-roles');
    Route::post('/dashboard/saveUser', [UserController::class, 'saveUser'])->name('dashboard.saveUser');
    Route::get('/dashboard/showUser', [UserController::class, 'showUser'])->name('dashboard.showUser');
    Route::get('/dashboard/edit-user/{id}', [UserController::class, 'edit'])->name('dashboard.edit-User');
    Route::post('/dashboard/update-user/{id}', [UserController::class, 'update'])->name('dashboard.update-User');
    Route::get('/dashboard/delete-user/{id}', [UserController::class, 'delete'])->name('dashboard.delete-User');
    Route::get('/dashboard/details-user/{id}', [UserController::class, 'details'])->name('dashboard.details-User');

    Route::prefix('role')->group(function () {
        Route::get('/create', [roleController::class, 'create'])->name('user.role.create');
        Route::post('/saveRole', [roleController::class, 'saveRole'])->name('user.role.saveRole');
        Route::get('/view', [roleController::class, 'view'])->name('user.role.view');
        Route::get('/edit/{id}', [roleController::class, 'edit'])->name('user.role.edit');
        Route::post('/update/{id}', [roleController::class, 'update'])->name('user.role.update');
        Route::get('/delete/{id}', [roleController::class, 'delete'])->name('user.role.delete');
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
    
    Route::prefix('comment')->group(function () {
        Route::post('/create', [commentController::class, 'create'])->name('frontEnd.comment.create');

    });

    Route::prefix('comment_reply')->group(function(){
        Route::get('/view',[comment_replyController::class,'view'])->name('admin.comment_reply.view');
        Route::post('/savereply',[comment_replyController::class,'savereply'])->name('admin.comment_reply.savereply');
        Route::get('/reply/{id}', [comment_replyController::class, 'reply'])->name('admin.comment_reply.reply');
        Route::post('/update/{id}', [comment_replyController::class, 'update'])->name('admin.comment_reply.update');
        Route::get('/delete/{id}', [comment_replyController::class, 'delete'])->name('admin.comment_reply.delete');

    });
    Route::prefix ('show_booking')->group(function(){
        Route::get('/view',[show_bookingController::class,'view'])->name('admin.show_booking.view');
        Route::get('/details/{id}',[show_bookingController::class,'details'])->name('admin.show_booking.details');
        Route::post('/update/{id}', [show_bookingController::class, 'update'])->name('admin.show_booking.update');
        Route::get('/delete/{id}', [show_bookingController::class, 'delete'])->name('admin.show_booking.delete');

    });
    
    Route::prefix('carousel')->group(function () {
        Route::get('/create', [carouselController::class, 'create'])->name('admin.carousel.create');
        Route::post('/savecarousel', [carouselController::class, 'savecarousel'])->name('admin.carousel.savecarousel');
        Route::get('/view', [carouselController::class, 'view'])->name('admin.carousel.view');
        Route::get('/edit/{id}', [carouselController::class, 'edit'])->name('admin.carousel.edit');
        Route::post('/update/{id}', [carouselController::class, 'update'])->name('admin.carousel.update');
        Route::get('/delete/{id}', [carouselController::class, 'delete'])->name('admin.carousel.delete');

    });
    
     
    Route::prefix('destination')->group(function () {
        Route::get('/create', [destinationController::class, 'create'])->name('admin.destination.create');
        Route::post('/savedestination', [destinationController::class, 'savedestination'])->name('admin.destination.savedestination');
        Route::get('/view', [destinationController::class, 'view'])->name('admin.destination.view');
        Route::get('/edit/{id}', [destinationController::class, 'edit'])->name('admin.destination.edit');
        Route::post('/update/{id}', [destinationController::class, 'update'])->name('admin.destination.update');
        Route::get('/delete/{id}', [destinationController::class, 'delete'])->name('admin.destination.delete');


    });
    Route::get('/create', [incomeController::class, 'create'])->name('admin.income.create');
    Route::post('/saveincome', [incomeController::class, 'saveincome'])->name('admin.income.saveincome');


    Route::prefix('contact')->group(function () {
        Route::get('/create', [contactController::class, 'create'])->name('admin.contact.create');
        Route::post('/savecontact', [contactController::class, 'savecontact'])->name('admin.contact.savecontact');
        Route::get('/view', [contactController::class, 'view'])->name('admin.contact.view');
        Route::get('/delete/{id}', [contactController::class, 'delete'])->name('admin.contact.delete');


    });

    
    Route::prefix('about')->group(function () {
        Route::get('/create', [aboutController::class, 'create'])->name('admin.about.create');
        Route::post('/saveabout', [aboutController::class, 'saveabout'])->name('admin.about.saveabout');
        Route::get('/view', [aboutController::class, 'view'])->name('admin.about.view');
        Route::get('/delete/{id}', [aboutController::class, 'delete'])->name('admin.about.delete');
    });
  
});
