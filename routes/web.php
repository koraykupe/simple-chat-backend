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

// Send chat message to another user
$app->post('user/messages', function (Request $request) {

    $this->validate($request, [
        'message' => 'required|string',
        'userId' => 'required|integer|exists:users,id',
        'targetUserId' => 'required|integer|different:userId|exists:users,id'
    ]);

    $message = new \Chat\Controllers\MessageController(new \Chat\Views\JsonOutputFormat(), new \Chat\Repositories\EloquentMessageRepository());
    return $message->add($request->input('userId'), $request->input('message'), $request->input('targetUserId'));
});

// Get chat messages for a user
$app->get('user/messages', function (Request $request) {

    $this->validate($request, [
        'userId' => 'required|integer|exists:users,id',
    ]);

    $chat = new \Chat\Controllers\MessageController(new \Chat\Views\JsonOutputFormat(), new \Chat\Repositories\EloquentMessageRepository());
    return $chat->get($request->input('userId'));
});
