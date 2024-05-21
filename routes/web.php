<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ApplicationsController;

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicantsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\JobsCategoryController;
use App\Http\Controllers\Admin\ProgressController;
use App\Http\Controllers\Admin\OrganizationsController;
use App\Http\Controllers\Admin\OrganizationsCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use Illuminate\Support\Facades\Auth;



Route::get('/admin_', function () {
    return view('admin.dashboard');})
    ->middleware('adminauth');

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ADMIN LOGIN ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::group(['prefix' => '/admin_'], function() {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::resource('/dashboard', DashboardController::class)->middleware('adminauth');
});
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ADMIN PAGES ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::group(['middleware' => 'adminauth'], function() {
    // jobs
    Route::resource('job', JobsController::class);
    Route::resource('job_categories', JobsCategoryController::class);
    // organizations
    Route::resource('organizations', OrganizationsController::class);
    Route::resource('organizations_categories', OrganizationsCategoryController::class);
    // applications
    Route::resource('applicants', ApplicantsController::class);
    // administrations
    Route::resource('administrators', AdminController::class);
    // gallery
    Route::resource('gallery', GalleryController::class);
    // progress
    Route::resource('progress', ProgressController::class);
    // spartie permissions and roles
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
});
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Auth::routes();
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// HOME ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// PAGES ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/jobs', [PagesController::class, 'jobs'])->name('jobs');
Route::get('/jobsCategory/{id}', [PagesController::class, 'jobsCategory'])->name('jobsCategory');
Route::get('/job_details', [PagesController::class, 'job_details'])->name('job_details');
Route::post('/add_jobs', [PagesController::class, 'addJobs'])->name('addJobs');
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// PROFILE ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::resource('profile', ProfileController::class);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// APPLICANT'S APPLICATION ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::resource('applications', ApplicationsController::class);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// CONTACT ROUTES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::resource('contacts', ContactsController::class);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

