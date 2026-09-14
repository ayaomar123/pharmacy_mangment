<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NotificationController;

/*
| Self registration is disabled: accounts are created by an administrator
| from the Users screen. Password reset keeps using the routes registered
| by Auth::routes() (password.request, password.email, password.reset,
| password.update).
*/
Auth::routes(['register' => false]);

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->middleware('throttle:10,1');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('categories', [CategoryController::class, 'index'])
        ->middleware('permission:view-category')->name('categories');
    Route::post('categories', [CategoryController::class, 'store'])->middleware('permission:create-category');
    Route::put('categories', [CategoryController::class, 'update'])->middleware('permission:update-category');
    Route::delete('categories', [CategoryController::class, 'destroy'])
        ->middleware('permission:destroy-category')
        ->name('categories.delete');

    Route::get('medicines', [ProductController::class, 'index'])
        ->middleware('permission:view-products')->name('products');
    Route::get('medicines/create', [ProductController::class, 'create'])
        ->middleware('permission:create-product')->name('add-product');
    Route::get('expired-medicines', [ProductController::class, 'expired'])
        ->middleware('permission:view-expired-products')->name('expired');
    Route::get('outstock-medicines', [ProductController::class, 'outstock'])
        ->middleware('permission:view-outstock-products')->name('outstock');
    Route::get('medicines/{product}', [ProductController::class, 'show'])
        ->middleware('permission:update-product')->name('edit-product');
    Route::post('medicines/create', [ProductController::class, 'store'])
        ->middleware('permission:create-product');
    Route::post('medicines/{product}', [ProductController::class, 'update'])
        ->middleware('permission:update-product')->name('update-medicine');
    Route::delete('medicines', [ProductController::class, 'destroy'])
        ->middleware('permission:destroy-product')->name('delete-medicine');

    Route::get('suppliers', [SupplierController::class, 'index'])
        ->middleware('permission:view-supplier')->name('suppliers');
    Route::get('add-supplier', [SupplierController::class, 'create'])
        ->middleware('permission:create-supplier')->name('add-supplier');
    Route::post('add-supplier', [SupplierController::class, 'store'])
        ->middleware('permission:create-supplier');
    Route::get('suppliers/{supplier}', [SupplierController::class, 'show'])
        ->middleware('permission:update-supplier')->name('edit-supplier');
    Route::put('suppliers/{supplier}', [SupplierController::class, 'update'])
        ->middleware('permission:update-supplier')->name('update-supplier');
    Route::delete('suppliers', [SupplierController::class, 'destroy'])
        ->middleware('permission:destroy-supplier');

    Route::get('stocks', [PurchaseController::class, 'index'])
        ->middleware('permission:view-purchase')->name('purchases');
    Route::get('add-stock', [PurchaseController::class, 'create'])
        ->middleware('permission:create-purchase')->name('add-purchase');
    Route::post('add-stock', [PurchaseController::class, 'store'])
        ->middleware('permission:create-purchase')->name('store-stock');
    Route::get('stocks/{purchase}', [PurchaseController::class, 'show'])
        ->middleware('permission:update-purchase')->name('edit-purchase');
    Route::put('stocks/{purchase}', [PurchaseController::class, 'update'])
        ->middleware('permission:update-purchase');
    Route::delete('stocks', [PurchaseController::class, 'destroy'])
        ->middleware('permission:destroy-purchase')->name('delete-stock');

    Route::get('sales', [SalesController::class, 'index'])
        ->middleware('permission:view-sales')->name('sales');
    // The same endpoint creates and updates a sale (see SalesController::store),
    // so it accepts either permission.
    Route::post('sales', [SalesController::class, 'store'])
        ->middleware('permission:create-sales|update-sales');
    Route::delete('sales', [SalesController::class, 'destroy'])
        ->middleware('permission:destroy-sales');

    Route::get('permissions', [PermissionController::class, 'index'])
        ->middleware('permission:view-permission')->name('permissions');
    Route::post('permissions', [PermissionController::class, 'store'])
        ->middleware('permission:create-permission');
    Route::put('permissions', [PermissionController::class, 'update'])
        ->middleware('permission:update-permission');
    Route::delete('permissions', [PermissionController::class, 'destroy'])
        ->middleware('permission:destroy-permission');

    Route::get('roles', [RoleController::class, 'index'])
        ->middleware('permission:view-role')->name('roles');
    Route::post('roles', [RoleController::class, 'store'])
        ->middleware('permission:create-role');
    Route::put('roles', [RoleController::class, 'update'])
        ->middleware('permission:update-role');
    Route::delete('roles', [RoleController::class, 'destroy'])
        ->middleware('permission:destroy-role');

    Route::get('users', [UserController::class, 'index'])
        ->middleware('permission:view-users')->name('users');
    Route::post('users', [UserController::class, 'store'])
        ->middleware('permission:create-user');
    Route::put('users', [UserController::class, 'update'])
        ->middleware('permission:update-user');
    Route::delete('users', [UserController::class, 'destroy'])
        ->middleware('permission:destroy-user');

    // Every authenticated user manages their own profile and notifications.
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile', [UserController::class, 'updateProfile']);
    Route::put('profile', [UserController::class, 'updatePassword'])->name('update-password');

    Route::get('notification', [NotificationController::class, 'markAsRead'])->name('mark-as-read');
    Route::get('notification-read', [NotificationController::class, 'read'])->name('read');

    Route::get('settings', [SettingController::class, 'index'])
        ->middleware('permission:view-settings')->name('settings');

    Route::get('reports', [ReportController::class, 'index'])
        ->middleware('permission:view-reports')->name('reports');
    Route::post('reports', [ReportController::class, 'getData'])
        ->middleware('permission:view-reports');
});
