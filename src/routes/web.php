<?php

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
use Illuminate\Support\Facades\Route;
use Towoju5\KycForm\Http\Controllers\KycVerificationController;


Route::get('/kyc/create', [KycVerificationController::class,  'create'])->name('kyc.create');
Route::post('/kyc/store', [KycVerificationController::class,  'store'])->name('kyc.store');
Route::group(['middleware' => config('kyc-form.middleware')], function () {
      Route::get('/admin/kyc', [KycVerificationController::class, 'index'])->name('kyc.index');
      Route::get('/kyc/show/{id}', [KycVerificationController::class, 'show'])->name('kyc.show');
      Route::post('/kyc/approve/{id}', [KycVerificationController::class, 'approve'])->name('kyc.approve');
      Route::delete('/kyc/reject/{id}', [KycVerificationController::class, 'reject'])->name('kyc.reject');
});
