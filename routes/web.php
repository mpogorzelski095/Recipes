<?php
Auth::routes();


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
Route::get('/tags', 'TagsController@index')->name('tags');
//każda kategoria po id - w sumie to po nazwie
Route::get('/tags/{tag}', 'TagsController@show');
Route::post('/like', 'PostsController@postLikePost')->name('like');

Route::get('/favorite', 'PostsController@favorite')->name('favorite');
Route::get('/users/{user}', 'UserController@showuser');
Route::get('/users/{user}', 'UserController@showuser');



////Strona główna
//Route::get('/', 'PostsController@index')->name('index');
//Route::post('/', 'PostsController@index')->name('sort');
//
//Route::get('/followUserPost', 'PostsController@followUserPost')->name('followUserPost');
//Route::post('/followUserPost', 'PostsController@followUserPost')->name('sortFollowUserPost');


Route::get('/community', 'PostsController@community')->name('community');
Route::post('/community', 'PostsController@community')->name('sortCommunity');



//Strona główna


//Strona główna
Route::get('/', 'PostsController@index')->name('index');
Route::post('/', 'PostsController@index')->name('sort');

Route::get('/followUserPost', 'PostsController@followUserPost')->name('followUserPost');
Route::post('/followUserPost', 'PostsController@followUserPost')->name('sortFollowUserPost');

Route::get('/categories', 'CategoriesController@index')->name('categories');
//każda kategoria po id - w sumie to po nazwie
Route::get('/categories/{category}', 'CategoriesController@show')->name('CategoryPost');



Route::get('/mypost', 'PostsController@mypost')->name('mypost');
Route::post('/mypost', 'PostsController@mypost')->name('sortMypost');

Route::get('/favorite', 'PostsController@favorite')->name('favorite');
Route::post('/favorite', 'PostsController@favorite')->name('sortFavorite');



Route::group(['middleware' => 'auth'], function () {
    Route::get('users', 'UserController@index')->name('users');
    Route::post('users/{user}/follow', 'UserController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UserController@unfollow')->name('unfollow');
});


Route::group([ 'middleware' => 'auth' ], function () {
    // ...
    Route::get('/notifications', 'UserController@notifications');
});


Route::post('users/toggle_follow', 'UserController@toggleFollow')->name(
    'toggle_follow'
);
Route::post('posts/toggle_like', 'PostsController@toggleLike')->name(
    'toggle_like'
);
