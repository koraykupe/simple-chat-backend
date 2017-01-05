<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:18
 */

namespace Chat;

use Illuminate\Support\Facades\DB;

class Message
{
    public function get(IMessageOutput $output, $userId)
    {
        $message = DB::select("SELECT * FROM messages");
        // $message = json_encode([$userId]);
        return $output->view($message);
    }
}