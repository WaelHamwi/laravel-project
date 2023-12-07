<?php

use App\Http\Controllers\EditorController;
use App\http\controllers\CategoryController;
use App\Models\Editor;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;



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
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    route::get('logout',[AdminController::class,'logout']);
    route::prefix('/front')->group(function(){
    route::get('',[FrontController::class,'category']);
    route::get('news',[FrontController::class,'Index']);
    route::get('{id}/news',[FrontController::class,'show']);
    route::get('{id}/category',[FrontController::class,'newsRelatedToCategory']);
});
route::prefix("/")->group(function(){
    route::get('',[FrontController::class,'Index']);
});
//routes for editor
    route::prefix("/cpanel/editor")->group(function(){
        route::get('create',[EditorController::class,'create']);//endpoint does not refer to path but it refers to what must be shown and written in the url
        route::post('store',[EditorController::class,'store']);
        route::get('all',[EditorController::class,'all']);
        route::get('{id}/edit',[EditorController::class,'show']);
        route::delete('{id}/delete',[EditorController::class,'delete']);
        route::patch('{id}/update',[EditorController::class,'update']);
    });
//routes for category
route::prefix('/cpanel/category')->group(function(){
route::get('create',[CategoryController::class,'create']);
route::post('store',[CategoryController::class,'store']);
route::get('all',[CategoryController::class,'all']);
route::delete('{id}/delete',[CategoryController::class,'delete']);
route::get('{id}/edit',[CategoryController::class,'edit']);
route::patch('{id}/update',[CategoryController::class,'update']);
route::get('search',[CategoryController::class,'Search']);
});
//routes for news
route::prefix('/cpanel/news')->group(function(){
route::get('create',[NewsController::class,'create']);
route::post('store',[NewsController::class,'store']);
route::get('all',[NewsController::class,'all']);
route::get('{id}/show',[NewsController::class,'show']);
route::delete('{id}/delete',[NewsController::class,'delete']);
route::patch('{id}/update',[NewsController::class,'update']);
});

//routes for front
});


//Route::get('/home', 'HomeController@index')->name('home');
