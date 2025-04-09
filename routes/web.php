<?php

use App\Http\Controllers\DeployController;
use App\Http\Controllers\InputUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OpenAiController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\StripeController;

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
//Route::get('/editor/{id}', [TemplatesController::class, 'edit'])->name('editor');
//Route::get('/temp-content/{id}', [TemplatesController::class, 'tempContent'])->name('template.tempContent');
//Route::post('/save-draft', [TemplatesController::class, 'saveDraft'])->name('template.saveDraft');

Route::post('/deploy', [DeployController::class, 'deploySite']);

Route::post('/chat', [OpenAiController::class, 'processChat']);


Route::get('/template/original/{id}', [TemplatesController::class, 'original'])->name('templateso.original');


Route::get('/editor/{id}', [TemplatesController::class, 'edit'])->name('editor');
Route::get('/temp-content/{id}', [TemplatesController::class, 'tempContent'])->name('templateso.tempContent');
Route::post('/save-draft', [TemplatesController::class, 'saveDraft'])->name('templateso.saveDraft')->withoutMiddleware('auth');



Route::get('/template/edit/{id}', [TemplatesController::class, 'edit'])->name('templateso.edit');
Route::get('/template-content/{id}', [TemplatesController::class, 'getTemplateContent'])->name('templateso.content');

Route::get('/templateso', [TemplatesController::class, 'index'])->name('templateso.index');
//Route::get('/drafts', [TemplatesController::class, 'drafts'])->name('templateso.drafts');
Route::post('/templateso/choose', [TemplatesController::class, 'choose'])->name('templateso.choose');


//Route::get('/templateso/preview/{templateName}', [TemplatesController::class, 'preview'])->name('templateso.preview');
//Route::get('/templateso/edit/{templateName}', [TemplatesController::class, 'edit'])->name('templateso.edit');
//Route::post('/templateso/update/{templateName}', [TemplatesController::class, 'update'])->name('templateso.update');
//Route::get('/templateso/download/{templateName}', [TemplatesController::class, 'download'])->name('templateso.download');

//login
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::get('/', function () {
    return view('welcome');
    });
Route::post('/login', [LoginController::class, 'login'])->name('login');
//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


//inputUser

Route::get('/inputUser', [InputUserController::class, 'index'])->name('index');
Route::post('/inputUser', [InputUserController::class, 'store'])->name('inputUser');

//templatesPages
//Route::get('/templateso', [TemplatesController::class, 'index'])->name('templateso');
//Route::post('/template/save', [TemplatesController::class, 'choseTemplate'])->name('save.template');




Route::get('/register', [AuthController::class , 'register'] )-> name('register');



Route::post('/register', [AuthController::class , 'store'] )-> name('register');

Route::get('/component-builder', [TypeController::class, 'index'])->name('comp.chose_comp');


Route::post('/save-content', [TypeController::class, 'saveContent'])->name('save.content');



Route::get('/generate-template', [GenerationController::class, 'renderTemplateWithComponents'])->name('template.generate');



Route::get('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::post('/session', [StripeController::class, 'session'])->name('stripe.session');
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');


Route::get('/generate', function () {
    return view('generate');
})->name('generate');

Route::get('/greeting', [GreetingController::class, 'getSites'])->name('gretting');
