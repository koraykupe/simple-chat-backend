<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:18
 */

namespace Chat\Controllers;

use Chat\Repositories\Contracts\IMessageRepository;
use Chat\Views\Contracts\IOutputFormat;

/**
 * Class MessageController
 * @package Chat\Controllers
 */
class MessageController
{
    /**
     * @var IOutputFormat
     */
    protected $format;
    /**
     * @var IMessageRepository
     */
    protected $message;

    /**
     * MessageController constructor.
     * @param IOutputFormat $format
     * @param IMessageRepository $message
     */
    function __construct(IOutputFormat $format, IMessageRepository $message)
    {
        $this->format = $format;
        $this->message = $message;
    }

    /**
     * @param $userId
     * @param $text
     * @param $targetUser
     * @return mixed
     */
    public function add($userId, $text, $targetUser)
    {
        $response = $this->message->add($userId, $text, $targetUser);
        return $this->format->view($response);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function get($userId)
    {
        $messages = $this->message->getUnread($userId);
        $this->message->markAsRead($userId, $messages->pluck('id')->toArray());

        return $this->format->view($messages);
    }
}