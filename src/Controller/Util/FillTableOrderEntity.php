<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:39
 */

namespace App\Controller\Util;

use App\Domain\Entity\OrderEntity;

class FillTableOrderEntity
{
    public function execute(OrderEntity $orderEntity): OrderEntity
    {
        $orderEntity->setPedido($this->random());
        $orderEntity->setIdProveedor($this->random());
        $orderEntity->setFechaSincronizado($this->random());
        $orderEntity->setEstado('pagado');
        $orderEntity->setFechaEnvioPrevistaMin($this->random());
        $orderEntity->setFechaEnvioPrevista($this->random());
        $orderEntity->setFechaEntregaPrevistaMin($this->random());
        $orderEntity->setFechaEntregaPrevista($this->random());
        $orderEntity->setIdArticulo($this->random());
        $orderEntity->setPedidoProveedor($this->random());
        $orderEntity->setAgenciaEnviada($this->random());
        $orderEntity->setEmailPedidoEnviado($this->random());
        $orderEntity->setEtiqueta($this->random());
        $orderEntity->setAlmacen($this->random());

        return $orderEntity;
    }

    private function random()
    {
        return random_int(1, 50);
    }
}