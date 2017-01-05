<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:10
 */
namespace Chat;

interface IMessageOutput
{
    public function view($data);
}