<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 13:06
 */

namespace app\Chat\Repositories;
use Chat\Models\User;
use Illuminate\Support\Facades\DB;

class MessageRepository
{
    public function get(User $id)
    {
        $messages = DB::table('messages')->where('user_id', $id)->get();
        // Mark as read
        DB::table('messages')->update();
    }

}