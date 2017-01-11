<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:18
 */

namespace Chat\Controllers;

use Chat\Contracts\IOutputFormat;
use Chat\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MessageController
{
    public function add($userId, $message)
    {
        $newMessage = new Message();
        $newMessage->user_id = $userId;
        $newMessage->message = $message;
        $newMessage->save();

        return $newMessage;
    }

    public function get($userId)
    {
        $messages = Message::where('user_id', $userId)
            ->where("is_read", 0)
            ->orderBy("id", "DESC")
            ->get();

        Message::where('user_id', $userId)
            ->where('id', $messages->pluck('id')->toArray())
            ->update(['is_read' => 1]);

        return $messages;
    }
}