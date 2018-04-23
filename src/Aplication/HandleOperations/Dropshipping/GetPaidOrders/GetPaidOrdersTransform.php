<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:12
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetPaidOrders;


use App\Entity\DropshippingPedidos;

class GetPaidOrdersTransform implements GetPaidOrdersDataTransform
{
    /**
     * @var $order DropshippingPedidos
     */
    public function transform(array $orders): array
    {
        $response=[];

        foreach ($orders as $order){

            $response[$order->getId()]=[
                'id'=>$order->getId(),
                'pedido'=>$order->getPedido(),
                'id_proveedor'=>$order->getIdProveedor(),
                'fecha_sincronizado'=>$order->getFechaSincronizado()->format('Y-m-d'),
                'estado'=>$order->getEstado(),
                'fecha_envio_prevista_min'=>$order->getFechaEnvioPrevistaMin()->format('Y-m-d'),
                'fecha_envio_prevista'=>$order->getPedido(),
                'fecha_entrega_prevista_min'=>$order->getPedido(),
                'fecha_entrega_prevista'=>$order->getPedido(),
                'id_articulo'=>$order->getPedido(),
                'pedido_proveedor'=>$order->getPedido(),
                'agencia_enviada'=>$order->getPedido(),
                'email_pedido_enviado'=>$order->getPedido(),
                'etiqueta'=>$order->getPedido(),
                'almacen'=>$order->getPedido(),
            ];
        }

        return $response;
    }
}