<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 11.01.2017
 * Time: 14:54
 */

namespace Chat\Repositories\Contracts;


interface IMessageRepository
{
    public function add(int $userId, $text, int $targetUser);
    public function getUnread(int $userId);
    public function markAsRead(int $userId, array $messageIds);

}