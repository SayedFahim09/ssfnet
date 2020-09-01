<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PagesController@Index');

Route::get('/pages/about_us','PagesController@About')->name('About');
Route::get('/pages/contact_us','PagesController@Contact')->name('Contact');


//Categorie crud are here........
Route::get('/posts/categorie/addCategorie','CategorieController@addCategorie')->name('addCategorie');
Route::post('/posts/categorie/insertCategorie','CategorieController@insertCategorie')->name('insertCategorie');
Route::get('/posts/categorie/allCategorie','CategorieController@allCategorie')->name('allCategorie');
Route::get('/posts/categorie/viewCategorie/{id}','CategorieController@viewCategorie');
Route::get('/posts/categorie/deleteCategorie/{id}','CategorieController@deleteCategorie');
Route::get('/posts/categorie/editCategorie/{id}','CategorieController@editCategorie');
Route::post('/posts/categorie/updateCategorie/{id}','CategorieController@updateCategorie');

//Post crud are here.......
Route::get('/posts/writePost','PostController@Post')->name('Post');
Route::post('/posts/insertPost/','PostController@insertPost')->name('insertPost');
Route::get('/posts/allPost','PostController@allPost')->name('allPost');
Route::get('/posts/viewPost/{id}','PostController@viewPost');
Route::get('/posts/editPost/{id}','PostController@editPost');
Route::post('/posts/updatePost/{id}','PostController@updatePost');
Route::get('/posts/deletePost/{id}','PostController@deletePost');

//Student crud are here.....
Route::get('/student/addStudent','StudentController@addStudent')->name('addStudent');
Route::post('/student/insertStudent/','StudentController@insertStudent')->name('insertStudent');
Route::get('/student/allStudent','StudentController@allStudent')->name('allStudent');
Route::get('/student/viewStudent/{id}','StudentController@viewStudent');
Route::get('/student/deleteStudent/{id}','StudentController@deleteStudent');
Route::get('/student/editStudent/{id}','StudentController@editStudent');
Route::post('/student/updateStudent/{id}','StudentController@updateStudent');

//Resource crud are here..........
Route::resource('/resource','ResourceController');







/*
Route::get('/us', function (){
	return view('pages.contactus');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
