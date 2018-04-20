<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:35
 */

namespace App\Application\Order\ListAllOrdersPaid;

use App\Infrastructure\Repository\DropshippingPedidos;

class ListAllOrdersPaid
{
    private $ordersRepository;
    private $listAllOrdersPaidDataTransform;

    public function __construct(
        ListAllOrdersPaidDataTransform $listAllOrdersPaidDataTransform,
        DropshippingPedidos $ordersRepository
    ) {
        $this->listAllOrdersPaidDataTransform = $listAllOrdersPaidDataTransform;
        $this->ordersRepository = $ordersRepository;
    }

    public function execute()
    {
        return $this->listAllOrdersPaidDataTransform
            ->transform(
                $this->ordersRepository
                    ->listAllOrdersPaid()
            );
    }
}
