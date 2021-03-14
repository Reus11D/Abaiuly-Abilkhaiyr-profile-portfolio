<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;

use App\Http\Controllers\BlogController;

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