<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:30
 */

namespace App\Application\Order\ListOneOrder;

use App\Domain\Model\Entity\DropshippingPedidos;

class ListOneOrderDataTransform
{
    public function transform(DropshippingPedidos $order)
    {
        $response[$order->getId()] =
            [
                'id' => $order->getId(),
                'pedido' => $order->getPedido(),
                'idProveedor' => $order->getIdProveedor(),
                'estado' => $order->getEstado()
            ];

        return $response;
    }
}
