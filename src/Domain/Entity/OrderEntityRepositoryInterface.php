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
    public function persist(OrderEntity $orderEntity): void;

    public function returnPaidOrders(): array;

    public function returnOrder(string $pedido): array;

    public function changeProvider(string $pedido, string $id_articulo, string $proveedor);

    public function reset(string $pedido, string $id_articulo);
}