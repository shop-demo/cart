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
use App\Http\Controllers\Admin\tabsController;
use App\Http\Controllers\Frontend\loginController;
use App\Http\Controllers\Admin\cartController;
use App\Http\Controllers\Admin\checkoutController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\commentControlle;


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
/*
Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('/', [homeController::class,'index'])->name('home.index');

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
	//add tabs
	Route::get('/productTabs/{id}',[productsController::class,'tabs'])->name('admin.productTabs');
	Route::put('/productTabs/{id}',[productsController::class,'addTabs'])->name('admin.productTabs_put');

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

	/*Tabs*/
	Route::get('/tabsList',[tabsController::class,'index'])->name('admin.tabsList');
	Route::get('/tabsAdd',[tabsController::class,'create'])->name('admin.tabsAdd');
	Route::post('/tabsAdd_post',[tabsController::class,'store'])->name('admin.tabsAdd_post');
	Route::get('/tabsEdit/{id}',[tabsController::class,'show'])->name('admin.tabsEdit');
	Route::put('/tabsEdit/{id}',[tabsController::class,'edit'])->name('admin.tabsEditPut');
	Route::delete('/tabstDelete/{id}',[tabsController::class,'delete'])->name('admin.tabsDelete');
	Route::any('/tabsDestroy}',[tabsController::class,'destroy'])->name('admin.tabsDestroy');
	//active
	Route::put('/activeTabs/{id}',[activeController::class,'activeTabs'])->name('admin.activeTabs');
	Route::put('/notActiveTabs/{id}',[activeController::class,'notActiveTabs'])->name('admin.notActiveTabs');
	/*end Tabs*/
	
	/*Cart-order-----------------------------------------------------------
	----------------------------------------------------------------*/
	Route::get('/orderList',[orderController::class,'index'])->name('admin.orderList');
	Route::get('/order_detailView/{id}',[orderController::class,'show'])->name('admin.order_detailView');
	Route::delete('/orderDelete/{id}',[orderController::class,'delete'])->name('admin.orderDelete');
	
	/*end Cart order-----------------------------------------------------------
	----------------------------------------------------------------*/

	/*comment-----------------------------------------------------------
	----------------------------------------------------------------*/
	Route::get('/comment',[commentControlle::class,'index'])->name('admin.commentList');
	Route::get('/comment/{id}',[commentControlle::class,'show'])->name('admin.commentEdit');
	Route::put('/commentPut/{id}',[commentControlle::class,'edit'])->name('admin.commentPut');
	Route::delete('/commentDelete/{id}',[commentControlle::class,'delete'])->name('admin.commentDelete');
	//comm reply
	Route::put('/commentRep/{id}',[commentControlle::class,'commRep'])->name('admin.commRep');
	
	//edit commRep
	Route::get('/editRep/{id}',[commentControlle::class,'editCommRep'])->name('admin.editRep');
	Route::put('/putRep/{id}',[commentControlle::class,'updateCommRep'])->name('admin.putRep');
	Route::delete('/putRep/{id}',[commentControlle::class,'deleteCommRep'])->name('admin.deleteCommRep');
	
	//satus
	Route::put('/commentActive/{id}',[commentControlle::class,'active'])->name('admin.commentActive');
	Route::put('/commentNotActive/{id}',[commentControlle::class,'notActive'])->name('admin.commentNotActive');
	//satus
	
	
	/*end comment-----------------------------------------------------------
	----------------------------------------------------------------*/



	//filemanager
	Route::get('/file',[adminController::class,'filemanager'])->name('admin.filemanager');

	//seach product
	//Route::get('/seach',[seachController::class,'seachProduct'])->name('admin.seachProduct');


});


//login admin
Route::get('/error',[adminController::class,'error'])->name('error');
Route::get('/admin',[adminController::class,'dashboard'])->name('dashboard');
Route::post('/adminlogin',[adminController::class,'login'])->name('dashboardLogin');
Route::post('/adminLogOut',[adminController::class,'logout'])->name('dashboardLogout');

/*FRONTEND login logout--------
------------------*/
Route::group(['prefix'=>'login'], function () {
	Route::get('/', [loginController::class,'login'])->name('dang-nhap');
	

	Route::post('/loginSubmit', [loginController::class,'loginSubmit'])->name('loginSubmit'); 
	Route::post('/logout', [loginController::class,'logout'])->name('logoutSubmit'); 
	//đăng ký
	Route::post('/resgiter', [loginController::class,'resgiter'])->name('resgiterPut');

	/*comment --------------------------
	------------------------------------*/
	Route::get('/comment', [homeController::class,'loadComm'])->name('loadComm');  
	Route::put('/comment', [homeController::class,'comment'])->name('home.comment');
	
	/*comment --------------------------
	------------------------------------*/  

});
/*cloze FRONTEND login logout--------
------------------*/

/*Shopping-carts*/
Route::group(['prefix'=>'cart'], function () {
	Route::get('/', [cartController::class,'index'])->name('cart.index');
	Route::post('/cartAdd', [cartController::class,'addCart'])->name('cart.add');
	Route::put('/cartUpdate/{id}', [cartController::class,'update'])->name('cart.update');
	Route::delete('/cartdelete/{id}', [cartController::class,'delete'])->name('cart.delete');
	Route::post('/cartDestroy',[cartController::class,'destroy'])->name('cart.destroy');
});
/*Shopping-order*/
Route::group(['prefix'=>'order'], function () {
	Route::put('/', [checkoutController::class,'order'])->name('cart.order');
	Route::get('/assert_order/{id}/{token_order}', [checkoutController::class,'assert_order'])->name('cart.assert_order');

});

//seach
Route::get('/seach', [homeController::class,'seach'])->name('home.seach');
Route::post('/rating',[homeController::class,'rating'])->name('home.rating');   
Route::get('/', [homeController::class,'index'])->name('home.index');
Route::get('{slug}', [homeController::class,'view'])->name('view');
Route::get('{page}/{slug}', [homeController::class,'product_Details'])->name('product_Details'); 
