<?php
/**
 * Created by PhpStorm.
 * User: koraykupe
 * Date: 9.01.2017
 * Time: 21:46
 */

namespace Chat\Views\Contracts;


interface IOutputFormat
{
    public function view($data);
}