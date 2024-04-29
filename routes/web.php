<?php

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

// Auth::routes();

Route::get('/',[App\Http\Controllers\PageController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\PageController::class, 'logout'])->name('logout');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/home', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/beranda', [App\Http\Controllers\PageController::class, 'index'])->name('index');

Route::get('/tambah/propertisg', [App\Http\Controllers\PageController::class, 'tambahPropertiSG']);
Route::post('/tambah/propertisg', [App\Http\Controllers\PropertyController::class, 'tambahPropertiSG']);

Route::get('/propertisg/cari', [App\Http\Controllers\PageController::class, 'cariPropertiSG']);
Route::get('/propertisg/{house}', [App\Http\Controllers\PropertiSGController::class, 'tampilPropertiSG']);
Route::get('/admin/propertisg/{house}', [App\Http\Controllers\PropertiSGController::class, 'tampilPropertiSG']);
Route::post('/propertisg/{house}', [App\Http\Controllers\PropertiSGController::class, 'cariPropertiSG']);
Route::post('/propertisg/{house}/report', [App\Http\Controllers\ReportPropertyController::class, 'reportPropertiSG']);
Route::get('/profil/propertisg/{house}/edit', [App\Http\Controllers\PropertiSGController::class, 'tampilEditPropertiSG'])->middleware('auth');
Route::post('/profil/propertisg/{house}/edit', [App\Http\Controllers\PropertiSGController::class, 'editPropertiSG']);
Route::post('/profil/propertisg/{house}/hapus', [App\Http\Controllers\PropertiSGController::class, 'hapusPropertiSG']);
Route::post('/admin/propertisg/{house}/hapus', [App\Http\Controllers\PropertiSGController::class, 'hapusPropertiSG'])->middleware('auth:admin');


//General Route
Route::post('/sendmessage', [App\Http\Controllers\MessageController::class, 'contactUsEmail'])->middleware('guest');

//User Profile Section
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'loadUserDashboard'])->middleware('auth');
Route::get('/profil/gantipassword', [App\Http\Controllers\PageController::class, 'gantiPassword'])->middleware('auth');
Route::get('/profil/editprofil', [App\Http\Controllers\PageController::class, 'editprofil'])->middleware('auth');
Route::get('/profil/hapusakun', [App\Http\Controllers\PageController::class, 'hapusakun'])->middleware('auth');
Route::get('/profil/propertisg', [App\Http\Controllers\PageController::class, 'PropertiSG'])->middleware('auth');
Route::get('/profil/terjual', [App\Http\Controllers\ProfilController::class, 'tampilPropertiTerjual'])->middleware('auth');
Route::get('/profil/terjual/{property}/tandaiterjual', [App\Http\Controllers\ProfilController::class, 'tandaiTerjual'])->middleware('auth');
Route::get('/profil/terjual/{property}/tandaibelumterjual', [App\Http\Controllers\ProfilController::class, 'tandaiBelumTerjual'])->middleware('auth');
Route::post('/profil/updateavatar', [App\Http\Controllers\ProfilController::class, 'updateAvatar'])->middleware('auth');
Route::post('/profil/user/{user}/hapus', [App\Http\Controllers\ProfilController::class, 'hapusAkunUser'])->middleware('auth');
Route::post('/profil/updateakun', [App\Http\Controllers\ProfilController::class, 'updateAkun'])->middleware('auth');
Route::post('/profil/updatepassword', [App\Http\Controllers\ProfilController::class, 'gantiPassword'])->middleware('auth');

//Admin Panel
Route::post('/admin/updateavatar', [App\Http\Controllers\AdminController::class, 'updateAvatar'])->middleware('auth:admin');
Route::get('/admin/user/{user}/tampil', [App\Http\Controllers\AdminController::class, 'tampilUser'])->middleware('auth:admin');
Route::get('/admin/properti/semua', [App\Http\Controllers\AdminController::class, 'tampilSemuaProperti'])->middleware('auth:admin');
Route::get('/admin/properti/propertisg', [App\Http\Controllers\AdminController::class, 'tampilSemuaPropertiSG'])->middleware('auth:admin');
Route::get('/admin/user/semua', [App\Http\Controllers\AdminController::class, 'tampilSemuaUser'])->middleware('auth:admin');
Route::get('/admin/user/{user}/kontak', [App\Http\Controllers\AdminController::class, 'adminKontakUser'])->middleware('auth:admin');
Route::post('/admin/user/kontak', [App\Http\Controllers\AdminController::class, 'adminKirimKontakUser'])->middleware('auth:admin');
Route::get('/admin/user/{user}/edit', [App\Http\Controllers\AdminController::class, 'tampilAdminEditUser'])->middleware('auth:admin');
Route::post('/admin/user/edit', [App\Http\Controllers\AdminController::class, 'adminEditUser'])->middleware('auth:admin');
Route::post('/admin/user/{user}/hapus', [App\Http\Controllers\AdminController::class, 'adminHapusUser'])->middleware('auth:admin');
Route::get('/admin/user/tambah', [App\Http\Controllers\AdminController::class, 'tampilAdminTambahUser'])->middleware('auth:admin');
Route::post('/admin/user/tambah', [App\Http\Controllers\AdminController::class, 'adminTambahUser'])->middleware('auth:admin');
Route::get('/admin/semua', [App\Http\Controllers\AdminController::class, 'tampilSemuaAdmin'])->middleware('auth:admin');
Route::get('/admin/tambah', [App\Http\Controllers\AdminController::class, 'tampilTambahAdmin'])->middleware('auth:admin');
Route::post('/admin/tambah', [App\Http\Controllers\AdminController::class, 'tambahAdmin'])->middleware('auth:admin');
Route::get('/admin/{admin}/edit', [App\Http\Controllers\AdminController::class, 'tampilEditAdmin'])->middleware('auth:admin');
Route::post('/admin/edit', [App\Http\Controllers\AdminController::class, 'editAdmin'])->middleware('auth:admin');
Route::post('/admin/{admin}/hapus', [App\Http\Controllers\AdminController::class, 'hapusAdmin'])->middleware('auth:admin');
Route::get('/admin/report', [App\Http\Controllers\AdminController::class, 'tampilReport'])->middleware('auth:admin');
Route::post('/admin/report/{property}/lock', [App\Http\Controllers\AdminController::class, 'lockProperti'])->middleware('auth:admin');
Route::post('/admin/report/{property}/unlock', [App\Http\Controllers\AdminController::class, 'unlockProperti'])->middleware('auth:admin');

// Auth::routes();
Auth::routes(['verify' => true]);

