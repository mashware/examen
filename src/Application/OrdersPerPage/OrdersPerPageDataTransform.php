<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:43
 */

namespace App\Application\OrdersPerPage;


interface OrdersPerPageDataTransform
{
    public function transform($orders);
}