<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Strona główna
Route::get('/', 'PostsController@index')->name('index');

//Strona główna
Route::get('/mypost', 'PostsController@mypost')->name('mypost')->name('mypost');
//Profile
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar')->name('profile');

//Tworzenie postów
Route::get('/posts/create', 'PostsController@create')->name('create');


Route::get('/posts/{post}/edit', 'PostsController@edit')->name('edit');

//Update postów
Route::patch('/posts/{post}/update', 'PostsController@update')->name('update');
//Usuwanie postów
Route::delete('/posts/{post}', 'PostsController@destroy')->name('destroy');

//Zapisywanie postów
Route::post('/posts', 'PostsController@store');

//Kazdy post osobno po id
Route::get('/posts/{post}', 'PostsController@show');

//Zapisywanie komentarza do postu
Route::post('/posts/{post}/comments', 'CommentsController@store');

//Strona główna
Route::get('/tags', 'TagsController@index');
//każda kategoria po id - w sumie to po nazwie
Route::get('/tags/{tag}', 'TagsController@show');


Route::post('/like','PostsController@postLikePost')->name('like');

Route::get('/users/{user}', 'UserController@showuser');

