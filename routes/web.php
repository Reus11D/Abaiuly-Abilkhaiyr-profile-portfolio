<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
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

Route::get('port', function(){
    $port = Post::find(1);
    return $port->title;
});
