<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Middleware\AdminMiddleware;

//welcome route..... 
route::get('/',[LandingPageController::class, 'welcome']);



// AdminController Routes Goes Here...
route::get('/admin_dashboard',[AdminController::class, 'index'])->middleware('is_admin');
route::get('/admin_list',[AdminController::class, 'admin_list'])->middleware('is_admin');
route::get('/admin_add',[AdminController::class, 'admin_add'])->middleware('is_admin');
route::post('/admin_add',[AdminController::class, 'insert_admin'])->middleware('is_admin');
route::get('/admin_edit/{id}',[AdminController::class, 'edit_admin'])->middleware('is_admin');
route::post('/admin_edit/{id}',[AdminController::class, 'update_edit_admin'])->middleware('is_admin');
route::get('/admin_delete/{id}',[AdminController::class, 'delete_admin'])->middleware('is_admin');



//AuthController Routes Goes Here...
route::get('/login',[AuthController::class, 'login_admin']);
route::post('/login',[AuthController::class, 'auth_login_admin']);
route::get('/log_out',[AuthController::class, 'log_out']);



//User&HomeController Routes Goes Here.....
route::get('/home',[HomeController::class, 'index']);