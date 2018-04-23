<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 15:20
 */

namespace Application\DropShipping\DropShippingReturnPaidOrders\Interfaces;

interface DataTransformerReturnPaidOrdersInterface
{
    public function execute(array $dataInput): array;
}