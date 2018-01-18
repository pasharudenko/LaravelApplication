<?php




Route::get('/', 'IndexAboutContactsController@index');
Route::get('/result', 'IndexAboutContactsController@search');
Route::get('/about', 'IndexAboutContactsController@about')->name('about');
Route::get('/contacts', 'IndexAboutContactsController@contacts')->name('contacts');
Route::get('post/{id}', 'IndexAboutContactsController@post');
Route::post('/comment', 'IndexAboutContactsController@storeComment');
Route::post('/reply', 'IndexAboutContactsController@storeReply');


Route::resource('/admin/posts', 'AdminPostsController')->middleware('Author');




Route::group(['middleware' => 'Admin'], function (){
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('/admin/users', 'AdminUsersController');

    Route::get('/admin/categories', 'AdminCategoriesController@index');
    Route::post('/admin/categories', 'AdminCategoriesController@store');
    Route::delete('/admin/categories/{id}', 'AdminCategoriesController@destroy');
    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('admin/comments/replies', 'ReplyController');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('categories/{id}', 'IndexAboutContactsController@categories');