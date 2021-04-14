<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Mail\DemoEmail;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('port/add', function(){
   DB::table('port')->insert([
     'title' => 'Laravel8',
     'body' => 'Tag'
   ]);
});

Route::get('port', [BlogController::class, 'index']);

Route::get('port/create', function() {
  return view('blog.create');
});

Route::post('port/create', [BlogController::class, 'store'])->name('add-post');

Route::get('port/{id}', [BlogController::class, 'get_post']);

//------------------------------------------Lab work 8 (email sending functionality)

Route::get('/contact-us', [ContactController::class, 'contact']);
Route::post('/contact-us', [ContactController::class, 'contactSubmit'])->name('contact.submit');


//------------------------------------------Lab work 9 
Route::get('/index', function () {
  return view('index');
});

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');
Route::middleware(['set_locale'])->group(function (){
  Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('index');
});
Route::get('/skills', function () {
    return view('skills');
});
Route::get('/contacts', function () {
    return view('contacts');
});

});
