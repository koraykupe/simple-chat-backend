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

use Illuminate\Http\Request;

// Add chat message
$app->post('user/messages', function (Request $request) {

    $this->validate($request, [
        'message' => 'required|string',
        'userId' => 'required|integer|exists:users,id',
    ]);

    $message = new \Chat\Message();
    return $message->add(new \Chat\OutputFormats\JsonOutputFormat(), $request->input('userId'), $request->input('message'));
});

// Get chat messages for a user
$app->get('user/messages', function (Request $request) {

    $this->validate($request, [
        'userId' => 'required|integer|exists:users,id',
    ]);

    $chat = new \Chat\Message();
    return $chat->get(new \Chat\OutputFormats\JsonOutputFormat(), $request->input('userId'));
});
