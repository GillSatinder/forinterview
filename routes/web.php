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



Route::group(['middleware' => ['web']], function ()
{

    Route::get('/', function () {
        return view('welcome') ;
    }) -> name('home');



    Route::post('/signup',[

        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::post('/signin',[

        'uses' => 'UserController@postSignIn',
        'as' => 'signin'


    ]);


    Route::get('/dashboard',[

        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'guest'
    ]);



    Route::post('/createPost',[

        'uses' => 'PostController@store',
        'as' => 'post.create'

    ]);

    Route::get('/delete-post/{id}',[


        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/logout',[

        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    Route::get('/account',[

        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);

    Route::post('/updateaccount',[

        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'

    ]);


    Route::get('/userimage/{filename}',[


       'uses'=> 'UserController@getUserImage',
        'as'=>'account.image'

    ]);






});


