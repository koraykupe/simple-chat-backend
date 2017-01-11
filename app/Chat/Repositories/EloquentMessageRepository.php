<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 11.01.2017
 * Time: 13:42
 */

namespace Chat\Repositories;


use Chat\Models\Message;
use Chat\Repositories\Contracts\IMessageRepository;

class EloquentMessageRepository implements IMessageRepository
{

    public function add(int $userId, $text, int$targetUser)
    {
        $newMessage = new Message();
        $newMessage->user_id = $userId;
        $newMessage->message = $text;
        $newMessage->target_user_id = $targetUser;
        $newMessage->save();

        return $newMessage;
    }

    public function getUnread(int $userId)
    {
        $messages = Message::where("target_user_id", $userId)
            ->with('user')
            ->with('targetUser')
            ->where("is_read", 0)
            ->orderBy("created_at", "DESC")
            ->get();

        return $messages;
    }

    public function markAsRead(int $userId, array $messageIds)
    {
        Message::where('target_user_id', $userId)
            ->whereIn('id', $messageIds)
            ->update(['is_read' => 1]);
    }

    public function all($columns = array('*'))
    {
        // TODO: Implement all() method.
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id, $columns = array('*'))
    {
        // TODO: Implement find() method.
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        // TODO: Implement findBy() method.
    }

}