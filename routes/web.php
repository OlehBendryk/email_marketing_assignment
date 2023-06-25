<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Mail\EmailMassSendingController;
use App\Http\Controllers\Mail\EmailTemplateController;
use App\Http\Controllers\Admin\GroupsController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [BaseController::class, 'index'])->name('dashboard');
Route::resource('customer', CustomersController::class);
Route::resource('group', GroupsController::class);

Route::resource('email_template', EmailTemplateController::class);
Route::resource('email_mass_sending', EmailMassSendingController::class);
