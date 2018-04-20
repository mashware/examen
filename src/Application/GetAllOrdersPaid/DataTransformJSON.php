<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:28
 */

namespace App\Application\GetAllOrdersPaid;

class DataTransformJSON implements DataTransform
{

    public function transform($orders)
    {
        $arrayOrders = [];
        foreach ($orders as $order){
            $arrayOrders[$order->getOrderId()] = [
                "orderNumber" => $order->getOrderId(),
                "status" => $order->getStateOrder(),
                "date_sincronize" => $order->getDateSync()
            ];
        }

        return json_encode($arrayOrders);
    }
}