<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:18
 */

namespace Chat;

use Chat\Contracts\IOutputFormat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Message
{
    public function add(IOutputFormat $output, $userId, $message)
    {
        $messageId = DB::table("messages")->insertGetId(['user_id' => $userId, 'message' => $message]);

        $text = [];
        $text['success_msg'] = 'Message added successfully.';
        $text['message_id'] = $messageId;

        return json_encode($text, JSON_PRETTY_PRINT);
    }

    public function get(IOutputFormat $output, $userId)
    {
        $message = DB::table("messages")->where("user_id", $userId)->orderBy("id", "DESC")->get();
        return $output->view($message);
    }
}