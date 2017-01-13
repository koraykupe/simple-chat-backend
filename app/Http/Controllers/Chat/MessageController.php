<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:18
 */

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Chat\Repositories\Contracts\IMessageRepository;
use Chat\Views\Contracts\IOutputFormat;
use Illuminate\Http\Request;

/**
 * Class MessageController
 * @package Chat\Controllers
 */
class MessageController extends Controller
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
     * @param Request $request
     * @return mixed
     */
    public function add(Request $request)
    {
         $this->validate($request, [
            'message' => 'required|string',
            'userId' => 'required|integer|exists:users,id',
            'targetUserId' => 'required|integer|different:userId|exists:users,id'
        ]);
        $response = $this->message->add($request->input('userId'), $request->input('message'), $request->input('targetUserId'));
        return $this->format->view($response);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required|integer|exists:users,id',
        ]);
        $messages = $this->message->getUnread($request->input('userId'));
        $this->message->markAsRead($request->input('userId'), $messages->pluck('id')->toArray());

        return $this->format->view($messages);
    }
}