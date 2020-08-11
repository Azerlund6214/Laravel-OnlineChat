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
| */

    Route::get('/',               "ChatController@index"    )->name('chat.index');

    #### *** Online-Chat *** ####
    Route::get( 'chat',              'ChatController@index'   )->name('chat.index');
    Route::get( 'chat/admin/{pass}', 'ChatController@index'   )->name('chat.indexAdmin');
    Route::post('chat/addmsg',       'ChatController@addmsg'  )->name('chat.addmsg');
    Route::delete( 'chat/delete/{id}/{admin_token}',   'ChatController@delete'    )->name('chat.delete');



    #### *** CRON *** ####



    #######
