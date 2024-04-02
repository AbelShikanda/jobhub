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


Route::group(['prefix' => '/admin_'], function() {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::resource('/dashboard', DashboardController::class)->middleware('adminauth');
});


Route::group(['middleware' => 'adminauth'], function() {
    Route::resource('applicants', ApplicantsController::class);
    Route::resource('organizations', OrganizationsController::class);
    Route::resource('job', JobsController::class);
    Route::resource('administrators', AdminController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('job_categories', JobsCategoryController::class);
    Route::resource('organizations_categories', OrganizationsCategoryController::class);
    Route::resource('progress', ProgressController::class);
    // spartie permissions
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
});


Auth::routes();
// HOME ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// PAGES ROUTES
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/jobs', [PagesController::class, 'jobs'])->name('jobs');
Route::get('/jobsCategory/{id}', [PagesController::class, 'jobsCategory'])->name('jobsCategory');
Route::get('/job_details', [PagesController::class, 'job_details'])->name('job_details');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// PROFILE ROUTE
Route::get('/profile_category', [ProfileController::class, 'profile_category'])->name('profile_category');
Route::resource('profile', ProfileController::class);

Route::resource('applications', ApplicationsController::class);
Route::resource('contacts', ContactsController::class);




// Route::get('/show', [JobsCategoryController::class, 'show'])->name('show'); 
// Route::get('/edit', [JobsCategoryController::class, 'edit'])->name('edit'); 







// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/catalog', [PagesController::class, 'catalog'])->name('catalog');
// Route::get('/catalog_single/{id}', [PagesController::class, 'catalog_single'])->name('catalog_single');
// Route::get('blog', [PagesController::class, 'blog'])->name('blog');
// Route::get('/blog_single/{id}', [PagesController::class, 'blog_single'])->name('blog_single');
// // Route::get('/custom', [CustomController::class, 'custom'])->name('custom');
// Route::get('/catalog_category', [PagesController::class, 'catalog_category'])->name('catalog_category');
// Route::get('/product', [PagesController::class, 'product'])->name('product');


// Route::get('/add_to_cart/{id}', [PagesController::class, 'getAddToCart'])->name('add_to_cart');
// Route::get('/cart', [PagesController::class, 'getCart'])->name('cart');
// Route::get('/deleteCart/{id}', [PagesController::class, 'deleteCart'])->name('deleteCart');
// Route::post('/updateCart/{id}', [PagesController::class, 'updateCart'])->name('updateCart');
// Route::get('/reduceCart/{id}', [PagesController::class, 'getReduceCart'])->name('reduceCart');

// Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
// Route::post('/postCheckout/{id}', [CheckoutController::class, 'postCheckout'])->name('postCheckout');

// Route::post('/wishlist/{id}', [ProfileController::class, 'wishlist'])->name('wishlist');
// Route::post('/deleteWish/{id}', [ProfileController::class, 'deleteWish'])->name('deleteWish');

// Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
// Route::patch('/profileEdit/{id}', [ProfileController::class, 'profileEdit'])->name('profileEdit');

// Route::resource('contacts', ContactsController::class);
