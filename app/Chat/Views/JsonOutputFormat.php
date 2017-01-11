<?php
/**
 * Created by PhpStorm.
 * User: koray.kup
 * Date: 11.01.2017
 * Time: 12:58
 */

namespace Chat\Views;

use Chat\Views\Contracts\IOutputFormat;

class JsonOutputFormat implements IOutputFormat
{

    public function view($data)
    {
        return response()->json($data);
    }
}