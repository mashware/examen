<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:45
 */

namespace App\Application\OrdersPerPage;


use Symfony\Component\HttpFoundation\Response;

class OrdersPerPageDataTransFormJSON implements OrdersPerPageDataTransform
{
    public function transform($orders)
    {
        if (empty($orders))
            return ['data' => 'Page Not Found', 'status' => Response::HTTP_NOT_FOUND];

        $arrayOrders = [];
        foreach ($orders as $order){
            $arrayOrders[$order->getOrderId()] = [
                "orderNumber" => $order->getOrderId(),
                "status" => $order->getStateOrder(),
                "date_sincronize" => $order->getDateSync()
            ];
        }

        return ['data' => $arrayOrders, 'status' => Response::HTTP_OK];
    }
}