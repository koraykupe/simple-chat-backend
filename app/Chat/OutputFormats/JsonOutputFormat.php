<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 5.01.2017
 * Time: 14:11
 */

namespace Chat\OutputFormats;

use Chat\Contracts\IOutputFormat;

class JsonOutputFormat implements IOutputFormat
{
    public function __construct()
    {
    }

    public function view($data)
    {
        return $data;
    }
}