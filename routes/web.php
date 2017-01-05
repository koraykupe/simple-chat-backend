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

// Add chat message
$app->put('/message', function () {
    // return \Chat\Message::add();
});

// Get a chat message
$app->get('/message/{userId}', function ($userId) {
    $chat = new \Chat\Message();
    return $chat->get(new \Chat\JsonMessageOutput(), $userId);
});

/*
 * @todo Get all chat messages
 * @todo Update a message
 * @todo Delete a message
 */
