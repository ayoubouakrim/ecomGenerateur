<?php

use App\Http\Controllers\InputUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\TypeController;
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


//login
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::get('/', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


//inputUser

Route::get('/inputUser', [InputUserController::class, 'index'])->name('index');
Route::post('/inputUser', [InputUserController::class, 'store'])->name('inputUser');

//templatesPages
Route::get('/templates', [TemplatesController::class, 'index'])->name('templates');
Route::post('/template/save', [TemplatesController::class, 'store'])->name('save.template');




Route::get('/register', [AuthController::class , 'register'] )-> name('register');



Route::post('/register', [AuthController::class , 'store'] )-> name('register');

Route::get('/component-builder', [TypeController::class, 'index'])->name('comp.chose_comp');


Route::post('/save-component-content', [TypeController::class, 'saveComponentContent'])->name('save.component.content');
