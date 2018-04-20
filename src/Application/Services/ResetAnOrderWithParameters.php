<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 12:12
 */

namespace App\Application\Services;


use App\Domain\Entity\DropShipping\OrderDropShipping;

class ResetAnOrderWithParameters
{
    public function execute(OrderDropShipping $orderDropShipping, string $status, int $orderProvider, int $warehouse, int $providerId): void
    {
        $orderDropShipping->setStateOrder($status);
        $orderDropShipping->setOrderProvider($orderProvider);
        $orderDropShipping->setWarehouse($warehouse);
        $orderDropShipping->setProviderId($providerId);
    }
}