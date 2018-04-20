<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:41
 */

namespace App\Application\Order\ListAllOrdersPaid;

class ListAllOrdersPaidDataTransform
{
    /**
     * @param array $orders
     * @return array
     */
    public function transform(array $orders): array
    {
        $response = [];
        foreach ($orders as $order) {
            $response[$order->getId()] =
                [
                    'id' => $order->getId(),
                    'pedido' => $order->getPedido(),
                    'idProveedor' => $order->getIdProveedor(),
                    'estado' => $order->getEstado()
                ];
        }
        return $response;
    }
}
