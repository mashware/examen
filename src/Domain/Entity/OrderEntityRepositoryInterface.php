<?php

namespace App\Domain\Entity;

/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:22
 */

interface OrderEntityRepositoryInterface

{
    public function createOrder(OrderEntity $orderEntity): void;

    public function returnPaidOrders(): array;

    public function reset(string $pedido, string $id_articulo): void;

    public function returnOrder(string $pedido): array;

    public function changeProvider(string $pedido, string $id_articulo, string $proveedor): void;

    public function paginateEx1();
}