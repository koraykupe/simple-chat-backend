<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 13.01.2017
 * Time: 08:49
 */

namespace Chat;


use Chat\Repositories\EloquentMessageRepository;
use Chat\Views\JsonOutputFormat;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

/**
 * Class ChatServiceProvider
 * @package Chat
 */
class ChatServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     *
     */
    public function register()
    {
        $this->app->bind('Chat\Views\Contracts\IOutputFormat', function () {
            return new JsonOutputFormat();
        });

        $this->app->bind('Chat\Repositories\Contracts\IMessageRepository', function () {
            return new EloquentMessageRepository();
        });
    }

}