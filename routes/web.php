<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->group(['namespace' => 'Chat'], function() use ($app) {
    // Get chat messages for a user
    $app->get('user/messages', [
        'uses' => 'MessageController@get'
    ]);

    // Send chat message to another user
    $app->post('user/messages', [
        'uses' => 'MessageController@add'
    ]);
});
