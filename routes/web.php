<?php

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
    // Линки на главной для гостей
    $links = \App\Link::all();

    // Посты
    $posts = App\Post::all();
    return view('home', compact('posts'));
    //return view('welcome')->with('links', $links);
    //return view('welcome', ['links' => $links]);
});

Route::get('/submit', function() {
  return view('submit');
});


// Создаем таксономию постов и прописываем путь к ним
Route::get('post/{slug}', function($slug){
	$post = App\Post::where('slug', '=', $slug)->firstOrFail();
	return view('post', compact('post'));
});

use Illuminate\Http\Request;

Route::post('/submit', function(Request $request) {
  $data = $request->validate([
    'title' => 'required|max:255',
    'url' => 'required|url|max:255',
    'description' => 'required|max:255',
  ]);

  $link = tap(new App\Link($data))->save();

  return redirect('/');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('my-chart', 'ChartController@getPie');
Route::get('my-chart', 'UserController@show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
