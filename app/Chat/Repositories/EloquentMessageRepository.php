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

/**
 * Class EloquentMessageRepository
 * @package Chat\Repositories
 */
class EloquentMessageRepository implements IMessageRepository
{

    /**
     * @param int $userId
     * @param $text
     * @param int $targetUser
     * @return Message
     */
    public function add(int $userId, $text, int$targetUser)
    {
        $newMessage = new Message();
        $newMessage->user_id = $userId;
        $newMessage->message = $text;
        $newMessage->target_user_id = $targetUser;
        $newMessage->save();

        return $newMessage;
    }

    /**
     * @param int $userId
     * @return mixed
     */
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

    /**
     * @param int $userId
     * @param array $messageIds
     */
    public function markAsRead(int $userId, array $messageIds)
    {
        Message::where('target_user_id', $userId)
            ->whereIn('id', $messageIds)
            ->update(['is_read' => 1]);
    }

    /**
     * @param array $columns
     */
    public function all($columns = array('*'))
    {
        // TODO: Implement all() method.
    }

    /**
     * @param int $perPage
     * @param array $columns
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        // TODO: Implement paginate() method.
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param array $data
     * @param $id
     */
    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $id
     * @param array $columns
     */
    public function find($id, $columns = array('*'))
    {
        // TODO: Implement find() method.
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     */
    public function findBy($field, $value, $columns = array('*'))
    {
        // TODO: Implement findBy() method.
    }

}