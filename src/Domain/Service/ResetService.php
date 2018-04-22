<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 22/04/18
 * Time: 11:12
 */

namespace App\Domain\Service;


use App\Domain\Entity\OrderEntity;

class ResetService
{
    public function execute(OrderEntity $orderEntity): OrderEntity
    {
        $orderEntity->setEstado('Nuevo');
        $orderEntity->setPedidoProveedor(0);
        $orderEntity->setAlmacen(0);
        $orderEntity->setIdProveedor(0);
        return $orderEntity;
    }

}