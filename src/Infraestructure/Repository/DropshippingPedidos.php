<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:14
 */

namespace App\Infraestructure\Repository;

use App\Entity\DropshippingPedidos as Order;

interface DropshippingPedidos
{
    public function selectAllOrders();

    public function getPaidOrders();

    public function getOrderByPedido(int $idPedido);

    public function findByIdPedidoAndIdArticulo(int $idPedido, int $idArticulo);

    public function persistAndFlush(Order $order);
}