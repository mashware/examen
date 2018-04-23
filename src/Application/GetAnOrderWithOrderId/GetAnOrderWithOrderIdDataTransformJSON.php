<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:59
 */

namespace App\Application\GetAnOrderWithOrderId;


class GetAnOrderWithOrderIdDataTransformJSON implements GetAnOrderWithOrderIdDataTransform
{
    public function transform($responseData)
    {

        if (empty($responseData['data']))
            $responseData['data'] = $responseData['message'];
        else{
            foreach($responseData['data'] as $order) {
                $arrayOrders = [
                    "orderNumber" => $order->getOrderId(),
                    "status" => $order->getStateOrder(),
                    "date_sincronize" => $order->getDateSync()
                ];
            }
            $responseData['data'] = $arrayOrders;
        }

        return $responseData;
    }
}