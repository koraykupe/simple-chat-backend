<?php
/**
 * Created by PhpStorm.
 * User: koraykupe
 * Date: 9.01.2017
 * Time: 21:46
 */

namespace Chat\Views\Contracts;


/**
 * Interface IOutputFormat
 * @package Chat\Views\Contracts
 */
interface IOutputFormat
{
    /**
     * @param $data
     * @return mixed
     */
    public function view($data);
}