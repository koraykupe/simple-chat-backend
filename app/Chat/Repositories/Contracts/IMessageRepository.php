<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 11.01.2017
 * Time: 14:54
 */

namespace Chat\Repositories\Contracts;


/**
 * Interface IMessageRepository
 * @package Chat\Repositories\Contracts
 */
interface IMessageRepository
{
    /**
     * @param int $userId
     * @param $text
     * @param int $targetUser
     * @return mixed
     */
    public function add(int $userId, $text, int $targetUser);

    /**
     * @param int $userId
     * @return mixed
     */
    public function getUnread(int $userId);

    /**
     * @param int $userId
     * @param array $messageIds
     * @return mixed
     */
    public function markAsRead(int $userId, array $messageIds);

}