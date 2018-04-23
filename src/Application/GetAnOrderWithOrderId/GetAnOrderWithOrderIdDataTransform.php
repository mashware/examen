<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:59
 */

namespace App\Application\GetAnOrderWithOrderId;


interface GetAnOrderWithOrderIdDataTransform
{
    public function transform($orders);
}