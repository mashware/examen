<?php

namespace Javier\Exam\Application\Order\ChangeProviderByIdAndArticle;

use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;

class ChangeProviderByIdAndArticleTransform implements ChangeProviderByIdAndArticleTransformInterface
{
    /**
     * @param array|DropShippingOrder[] $orders
     * @return array
     */
    public function transform(array $orders)
    {
        $ordersTransform = [];
        foreach ($orders as $order) {
            $ordersTransform[] = [
                'id' => $order->getId(),
                'pedido' => $order->getPedido(),
                'id_proveedor' => $order->getIdProveedor(),
                'estado' => $order->getEstado(),
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
