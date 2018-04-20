<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:29
 */

namespace App\Application\DropShipping\GetOrder;


interface DataTransform
{
    public function transform($products);
}