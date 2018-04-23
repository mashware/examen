<?php

namespace Javier\Exam\Application\Order\GivenById;

use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;

class GivenByIdTransform implements GivenByIdTransformInterface
{
    /**
     * @param array|DropShippingOrder[] $orders
     * @return array
     */
    public function transform(array $orders): array
    {
        $ordersTransform = [];
        foreach ($orders as $order) {
            $ordersTransform[] = [
                'id' => $order->getId(),
                'pedido' => $order->getPedido(),
                'id_proveedor' => $order->getIdProveedor(),
                'fecha_sincronizado' => $order->getFechaSincronizado(),
                'estado' => $order->getEstado(),
                'fecha_envio_prevista_min' => $order->getFechaEnvioPrevistaMin(),
                'fecha_envio_prevista' => $order->getFechaEnvioPrevista(),
                'fecha_entrega_prevista_min' => $order->getFechaEntregaPrevistaMin(),
                'fecha_entrega_prevista' => $order->getFechaEntregaPrevista(),
                'id_articulo' => $order->getIdArticulo(),
                'pedido_proveedor' => $order->getPedidoProveedor(),
                'agencia_enviada' => $order->getAgenciaEnviada(),
                'email_pedido_enviado' => $order->getEmailPedidoEnviado(),
                'etiqueta' => $order->getEtiqueta(),
                'almacen' => $order->getAlmacen()
            ];
        }

        return $ordersTransform;
    }
}
