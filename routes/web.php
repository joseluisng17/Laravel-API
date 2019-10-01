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

// Cargando clases
use App\Http\Middleware\ApiAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
});


//RUTAS DEL API

    /* Metodos HTTP comunes

        GET: conseguir datos o recursos
        POST: Guardar datos o recursos o hacer logica desde un formulario
        PUT: Actualizar datos o recursos
        Delete: Eliminar datos o recursos

    */

    //Rutas de prueba
    //Route::get('/usuario/pruebas', 'UserController@prueba');
    //Route::get('/categoria/pruebas', 'CategoryController@prueba');
    //Route::get('/entrada/pruebas', 'PostController@prueba');

    // Rutas del controlador de usuario
    Route::post('/api/register', 'UserController@register');
    Route::post('/api/login', 'UserController@login');
    Route::put('/api/user/update', 'UserController@update');
    Route::post('/api/user/upload', 'UserController@upload')->middleware(ApiAuthMiddleware::class);
    Route::get('/api/user/avatar/{filename}', 'UserController@getImage');
    Route::get('/api/user/detail/{id}', 'UserController@detail');

    // Rutas del controlador de categorias
    Route::resource('/api/category', 'CategoryController');

    //Rutas de controlador de entradas
    Route::resource('/api/post', 'PostController');
    Route::post('/api/post/upload', 'PostController@upload');
    Route::get('/api/post/image/{filename}', 'PostController@getImage');
    Route::get('/api/post/category/{id}', 'PostController@getPostsByCategory');
    Route::get('/api/post/user/{id}', 'PostController@getPostsByUser');










