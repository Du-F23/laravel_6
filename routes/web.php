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


/* USUARIOS */
/* index lista */

/* Usuarios*/
/* get obtenemos los  datos en BD del usuario con la funcion index*/
Route::get('/users','UserController@index');
/* store guarda datos en BD */
Route::post('/users', 'UserController@store')->name('user.store');
/* Delete elima datos */
Route::delete('/users/{user}' ,'UserController@delete')->name('user.destroy');

/* Categorias */

Route::get('/category','CategoryController@index');
Route::post('/categories','CategoryController@store')->name('category.store');
Route::get('/categories/{$id}','CategoryController@edit')->name('category.edit');
Route::delete('/categories/{category}','CategoryController@delete')->name('category.destroy');

/* Articulos */

// Route::get('/articles','ControllerArticle@index');
// Route::post('/articles','ControllerArticle@store')->name('article.store');
// Route::get('/articles/{$id}','ControllerArticle@show');

/*  Images */

Route::post('/images', 'ImagesController@store')->name('images.store');
/* Auth Routes */
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('articles', 'ArticleController');
Route::get('/articles/create','ArticleController@create');

/* Email MailTrap */
Route::get('enviar', ['as' => 'enviar', function () {

    $data = ['link' => 'http://'];

    \Mail::send('email.notificacion', $data, function ($message) {

    $message->from('email@styde.net', 'Styde.Net');

    $message->to('fernandoduarte1v@gmail.com')->subject('Notificación');

    });

    return "Se envío el email";
    }]);

    Auth::routes(['verify' => true]);
    Auth::routes();


    Route::get('/articles','ArticleController@index');
