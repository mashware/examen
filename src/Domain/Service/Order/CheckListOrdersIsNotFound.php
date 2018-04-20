<?php

namespace Javier\Exam\Domain\Service\Order;

use Javier\Exam\Domain\Model\Order\OrdersNotFoundException;

class CheckListOrdersIsNotFound
{
    /**
     * @param array $orders
     * @return array
     * @throws \Exception
     */
    public function execute(array $orders): array
    {
        if(0 === count($orders)){
            throw new OrdersNotFoundException('No se encontraron pedidos');
        }

        return $orders;
    }
}
