<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\Admin\activeController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\productsController;
use App\Http\Controllers\Admin\customesController;
use App\Http\Controllers\Admin\rolesController;
use App\Http\Controllers\Ajax\seachController;
use App\Http\Controllers\Frontend\homeController;
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
    return view('welcome');
});


/*ADMIN*/

Route::group(['prefix'=>'admin','middleware'=>'customers'], function () {
	
	//banner
	Route::get('/bannerList',[bannerController::class,'index'])->name('admin.bannerList');
	Route::get('/bannerAdd',[bannerController::class,'create'])->name('admin.bannerAdd');
	Route::post('/bannerAdd',[bannerController::class,'store'])->name('admin.bannerAdd_post'); 
	Route::get('/bannerEdit/{id}',[bannerController::class,'show'])->name('admin.bannerEdit');
	Route::post('/bannerEdit/{id}',[bannerController::class,'edit'])->name('admin.bannerEdit_post');

	Route::delete('/bannerDelete/{id}',[bannerController::class,'delete'])->name('admin.bannerDelete');
	Route::any('/banner_DeleteAll',[bannerController::class,'destroy'])->name('admin.banner_DeleteAll');
   //active banner
	Route::put('/activeBanner/{id}',[activeController::class,'activeBanner'])->name('admin.activeBanner');
	Route::put('/not_activeBanner/{id}',[activeController::class,'not_activeBanner'])->name('admin.not_activeBanner');

	//caterory
	Route::get('/categoryList',[categoryController::class,'index'])->name('admin.categoryList');
	Route::get('/categoryAdd',[categoryController::class,'create'])->name('admin.categoryAdd');
	Route::post('/categoryAdd',[categoryController::class,'store'])->name('admin.categoryPost');
	Route::get('/categoryEdit/{id}',[categoryController::class,'show'])->name('admin.categoryEdit');
	Route::post('/categoryEdit/{id}',[categoryController::class,'edit'])->name('admin.categoryEdit_post');

	Route::delete('/categoryDelete/{id}',[categoryController::class,'delete'])->name('admin.categoryDelete'); 
	Route::any('/categoryDeleteAll',[categoryController::class,'destroy'])->name('admin.categoryDeleteAll'); 
	//active
	Route::put('/activeCategory/{id}',[activeController::class,'activeCategory'])->name('admin.activeCategory');
	Route::put('/notActiveCategory/{id}',[activeController::class,'notActiveCategory'])->name('admin.notActiveCategory');

	//product
	Route::get('/productList',[productsController::class,'index'])->name('admin.productList');
	Route::get('/productAdd',[productsController::class,'create'])->name('admin.productAdd');
	Route::post('/productAdd',[productsController::class,'store'])->name('admin.productAdd_Post');
	Route::get('/productEdit/{id}',[productsController::class,'show'])->name('admin.productEdit');
	Route::put('/productEdit/{id}',[productsController::class,'update'])->name('admin.productUpdate');

	Route::delete('/productDelete/{id}',[productsController::class,'delete'])->name('admin.productDelete');
	Route::any('/productsDelete',[productsController::class,'destroy'])->name('admin.productsDelete');
	//active
	Route::put('/activeProduct/{id}',[activeController::class,'activeProduct'])->name('admin.activeProduct');
	Route::put('/notActiveProduct/{id}',[activeController::class,'notActiveProduct'])->name('admin.notActiveProduct');

	//customers
	Route::get('/customeList',[customesController::class,'index'])->name('admin.customeList');
	Route::get('/customeAdd',[customesController::class,'create'])->name('admin.customeAdd');
	Route::post('/customeAdd',[customesController::class,'store'])->name('admin.customeAdd_Post');
	Route::get('/customeEdit/{id}',[customesController::class,'show'])->name('admin.customeEdit');
	Route::put('/customeEdit/{id}',[customesController::class,'edit'])->name('admin.customeUpdate');
	Route::delete('/customeDelete/{id}',[customesController::class,'delete'])->name('admin.customeDelete');
	Route::any('/customeDestroy',[customesController::class,'destroy'])->name('admin.customeDestroy');
	//add quyên
	Route::get('/customeQuyen/{id}',[customesController::class,'quyen'])->name('admin.customeQuyen');
	Route::put('/customeQuyen/{id}',[customesController::class,'quyenAdd'])->name('admin.customeQuyenAdd');
	
	//active
	Route::put('/activeCustomes/{id}',[activeController::class,'activeCustomes'])->name('admin.activeCustomes');
	Route::put('/notActiveCustomes/{id}',[activeController::class,'notActiveCustomes'])->name('admin.notActiveCustomes');
	//active
	
	/*--roles---------------------
	------------------------------*/
	Route::get('/roleList',[rolesController::class,'index'])->name('admin.roleList');
	Route::get('/roleAdd',[rolesController::class,'create'])->name('admin.roleAdd');
	Route::post('/roleAdd-post',[rolesController::class,'store'])->name('admin.roleAdd_post');
	Route::get('/roleEdit/{id}',[rolesController::class,'show'])->name('admin.roleEdit');
	Route::put('/roleEdit/{id}',[rolesController::class,'edit'])->name('admin.roleEditPut');
	Route::delete('/roleDelete/{id}',[rolesController::class,'delete'])->name('admin.roleDelete');
	Route::any('/roleDestroy',[rolesController::class,'destroy'])->name('admin.roleDestroy');
	//back
	Route::get('/roleList',[rolesController::class,'index'])->name('admin.roleList');
	//active
	Route::put('/activeRole/{id}',[activeController::class,'activeRole'])->name('admin.activeRole');
	Route::put('/notActiveRole/{id}',[activeController::class,'notActiveRole'])->name('admin.notActiveRole');
	//active

	/*--roles---------------------
	------------------------------*/
	
	//filemanager
	Route::get('/file',[adminController::class,'filemanager'])->name('admin.filemanager');

	//seach product
	//Route::get('/seach',[seachController::class,'seachProduct'])->name('admin.seachProduct');



});

Route::get('/error',[adminController::class,'error'])->name('error');
Route::get('/admin',[adminController::class,'dashboard'])->name('dashboard');
Route::post('/adminlogin',[adminController::class,'login'])->name('dashboardLogin');
Route::post('/adminLogOut',[adminController::class,'logout'])->name('dashboardLogout');



/*FRONTEND--------
------------------*/
Route::get('/home', [homeController::class,'index'])->name('home.index'); 