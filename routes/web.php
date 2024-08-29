<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EbookController;



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


Route::get('/', [EbookController::class, 'index']);
Route::get('/order-book/{passing_id_book}', [EbookController::class, 'order_book'])->name('order_book');
Route::post('/order-process', [EbookController::class, 'order_process'])->name('order_process');

Route::get('/testEmail', [AuthController::class, 'testEmail'])->name('testEmail');

Route::post('/generate-pass', [AuthController::class, 'genpass'])->name('genpass');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/process-login', [AuthController::class, 'loginProcess'])->name('loginProcess');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/process-register', [AuthController::class, 'registerProcess'])->name('registerProcess');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group( function(){
    Route::get('/menu', [AdminController::class, 'menu'])->name('menu');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/faq', [AdminController::class, 'faq'])->name('faq');
    
    // =============================
    // PROFILE USERS
    // =============================
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/upload_pp', [AdminController::class, 'upload_pp'])->name('profile.upload_pp');
    Route::post('/profile/update_profile', [AdminController::class, 'update_profile'])->name('profile.update_profile');
    Route::post('/profile/change_password', [AdminController::class, 'change_password'])->name('profile.change_password');


    // =============================
    // NOTIFICATION
    // =============================
    Route::get('/notifications/unread', [AdminController::class, 'unread'])->name('notif.unread');
    Route::post('/notifications/mark-as-read', [AdminController::class, 'markread'])->name('notif.markread');


    // =============================
    // DATA REFER
    // =============================
    Route::get('/data-refer', [AdminController::class, 'data_refer'])->name('data_refer.menu');
    Route::get('/buat-refer', [AdminController::class, 'buatrefer'])->name('data_refer.buatrefer');
    Route::post('/buat-refer/process', [AdminController::class, 'executebuatrefer'])->name('data_refer.executebuatrefer');
    Route::post('getdetail_datareffer', [AdminController::class, 'getdetail_datareffer'])->name('data_refer.getdetail_datareffer');
    Route::post('/buat-refer/update', [AdminController::class, 'executeupdaterefer'])->name('data_refer.executeupdaterefer');
    Route::get('/buat-refer/delete/{id}', [AdminController::class, 'hapusrefer'])->name('data_refer.hapusrefer');

});
