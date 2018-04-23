<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 9:47
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetPaidOrders;


interface GetPaidOrdersDataTransform
{
    public function transform(array $paidOrders):array ;
}