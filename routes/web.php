<?php

use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ApprovedRequisitionController;
use App\Http\Controllers\Admin\BorrowedItemController;
use App\Http\Controllers\Admin\DeclineRequisitionController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Client\ClientDashboard;
use App\Http\Controllers\RedirectUserController;
use App\Http\Controllers\Client\RequisitionController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [RedirectUserController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'superadmin', 'middleware' => ['role:superadministrator']], function () {
        Route::get('sdashboard', [SuperAdminDashboard::class, 'index'])->name('sdashboard');
        Route::resource('users', UserController::class);
        Route::resource('requisitions', RequisitionController::class)->only(['index', 'update']);

    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:administrator']], function () {
        Route::get('adashboard', [AdminDashboard::class, 'index'])->name('adashboard');
        Route::resource('inventory', InventoryController::class);
        Route::get('returned-items', [RequisitionController::class, 'approveReturn'])->name('admin-return');
        Route::delete('returned-items/{requisition}', [RequisitionController::class, 'destroy'])->name('delete-approved-return');
        Route::resource('approved-requisition', ApprovedRequisitionController::class);
        Route::get('borrowed-requisition', BorrowedItemController::class)->name('borrowed-item');
        Route::get('decline-requisition', DeclineRequisitionController::class)->name('declined-requisition');
        
    });

    Route::group(['prefix' => 'client', 'middleware' => ['role:client']], function () {
        Route::get('cdashboard', [ClientDashboard::class, 'index'])->name('cdashboard');
        Route::get('requisition/{item}', [RequisitionController::class, 'create'])->name('requisition.create');
        Route::get('my-approved-requisition', [ApprovedRequisitionController::class, 'approved'])->name('requisition.approved');
        Route::get('return-item', [RequisitionController::class, 'toBeReturn'])->name('toBeReturn');
        Route::put('return-item/{requisition}', [RequisitionController::class, 'updateToReturn'])->name('returnItem');
        Route::resource('requisition', RequisitionController::class)->except('create');  

    });

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
