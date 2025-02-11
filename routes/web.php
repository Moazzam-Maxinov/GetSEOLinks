<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PublisherServiceController;
use App\Http\Controllers\User\VendorServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaticPagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('common.home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/privacy-policy', [StaticPagesController::class, 'privacyPolicy']);

Route::get('/terms-and-condition', [StaticPagesController::class, 'termsAndCondition']);

// Routes for Admin
// All admin routes are prefixed with /admin and use the AdminController.
// The name('admin.') prefix allows naming routes like admin.dashboard.
// Admin routes (only accessible by role = 1)
Route::middleware(['auth', 'role:1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-website', [AdminController::class, 'addWebsiteForm'])->name('add-website-form');
    Route::post('/add-website', [AdminController::class, 'addWebsite'])->name('add-website');
    Route::get('/websites-list', [AdminController::class, 'viewWebsites'])->name('websites-list');
    Route::get('/websites/data', [AdminController::class, 'getWebsites'])->name('websites.data'); // Add this new route for API
    Route::get('/websites/{id}', [AdminController::class, 'showWebsiteDetails'])->name('showWebsiteDetails');
    Route::get('/orders', [AdminController::class, 'allOrders'])->name('all-orders');
    Route::get('/orders/new', [AdminController::class, 'newOrders'])->name('new-orders');
    Route::get('/orders/manage-order', [AdminController::class, 'manageOrder'])->name('manage-order');
    Route::get('/orders/completed', [AdminController::class, 'completedOrders'])->name('completed-orders'); //(completed from our end, now it is upto vendor/buyer to approve or reject)
    Route::get('/orders/invoice', [AdminController::class, 'showInvoice'])->name('showInvoice');
    Route::post('/orders/invoice/update', [AdminController::class, 'updateInvoice'])->name('updateInvoice');

    // API Routes
    Route::get('/api/websitedetail/{id}', [AdminController::class, 'getWebsiteDetails']);
    Route::get('/api/dashboarddata', [AdminController::class, 'fetchDashboardData'])->name('fetchDashboardData');
    Route::get('/api/orders', [AdminController::class, 'getAllOrders'])->name('getAllOrders');
    Route::get('/api/orders/new', [AdminController::class, 'getNewOrders'])->name('getNewOrders');
    Route::get('/api/getOrderById', [AdminController::class, 'getOrderById'])->name('getOrderById');
    Route::post('/api/updateOrderStatus', [AdminController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    Route::get('/api/orders/completed', [AdminController::class, 'getCompletedOrders'])->name('getCompletedOrders');
});
// Route::get('/api/websitedetail/{id}', [AdminController::class, 'getWebsiteDetails']);

// Route::get('/admin/websites/{id}', function () {
//     return view('admin.website-details');
// })->name('admin.websites.show');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin/websites', [AdminController::class, 'getWebsites']);
    // Route::get('/admin/websites/{id}', [AdminController::class, 'show']);
    // Route::get('/admin/websites/{id}', function () {
    //     return view('admin.websites.show');
    // })->name('admin.websites.show');
});

// User routes (only accessible by role = 0)
Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/publisher/orders/new', [PublisherServiceController::class, 'newPublisherOrders'])->name('user.publisher-new-orders');
    Route::get('/publisher/orders', [PublisherServiceController::class, 'allPublisherOrders'])->name('user.publisher-all-orders');
    Route::get('/publisher/orders/manage-order', [PublisherServiceController::class, 'manageOrder'])->name('user.manage-order');
    Route::get('/vendor/orders', [VendorServiceController::class, 'allVendorOrders'])->name('user.vendor-all-orders');
    Route::get('/vendor/review-order', [VendorServiceController::class, 'reviewOrder'])->name('user.review-order');
    Route::post('/vendor/review-order', [VendorServiceController::class, 'reviewOrderPost'])->name('user.review-order-post');
    Route::get('/websites', [VendorServiceController::class, 'allWebsites'])->name('user.allWebsites');
    Route::get('/websites/buy-link', [VendorServiceController::class, 'buyLink'])->name('user.buyLink');
    Route::post('/websites/buy-link', [VendorServiceController::class, 'placeOrder'])->name('user.placeOrder');
    Route::get('/websites/buy-link/order-confirmation', [VendorServiceController::class, 'orderConfirmation'])->name('user.order-confirmation');
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.change-password');
    Route::put('/change-password', [UserController::class, 'changePassword'])->name('user.update-password');
    Route::get('/contact', [VendorServiceController::class, 'contact'])->name('user.contact');

    // Route::get('/publisher/add-website', [PublisherServiceController::class, 'addWebsiteForm'])->name('publisher-add-website-form');
    // Route::post('/publisher/add-website', [PublisherServiceController::class, 'addWebsite'])->name('publisher-add-website-post');

    Route::get('/api/dashboard-data', [UserController::class, 'fetchDashboardData'])->name('user.fetchDashboardData');
    Route::post('/api/switch-role', [UserController::class, 'switchRole'])->name('user.switchRole');
    Route::get('/api/publisher-data', [UserController::class, 'getPublisherDashbordData'])->name('user.getPublisherDashbordData');
    Route::get('/api/publisher/orders/new', [PublisherServiceController::class, 'getNewPublisherOrders'])->name('getNewPublisherOrders');
    Route::get('/api/publisher/orders', [PublisherServiceController::class, 'getAllPublisherOrders'])->name('getAllPublisherOrders');
    Route::get('/api/vendor/orders', [VendorServiceController::class, 'getAllVendorOrders'])->name('getAllVendorOrders');
    Route::get('/api/getAllWebsites', [VendorServiceController::class, 'getAllWebsites'])->name('getAllWebsites');
    Route::get('/api/getAllCategories', [VendorServiceController::class, 'getAllCategories'])->name('getAllCategories');
    Route::get('/api/getOrderById', [PublisherServiceController::class, 'getOrderById'])->name('getOrderById');
    Route::post('/api/publisher/updateOrderStatus', [PublisherServiceController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    // Add other user routes here...
});

// Route::get('/dashboard1', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Logout Route
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__ . '/auth.php';
