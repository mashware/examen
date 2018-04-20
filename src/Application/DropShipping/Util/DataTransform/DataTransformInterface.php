<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 15:28
 */

namespace App\Application\DropShipping\Util\DataTransform;


interface DataTransformInterface
{
    public function execute(array $array);
}