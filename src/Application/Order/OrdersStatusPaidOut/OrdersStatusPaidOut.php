<?php

namespace Javier\Exam\Application\Order\OrdersStatusPaidOut;

use Javier\Exam\Domain\Model\Order\DropShippingOrderInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class OrdersStatusPaidOut
{
    private $dropShippingOrderRepository;
    private $checkList;

    public function __construct(DropShippingOrderInterface $dropShippingOrderRepository,
                                CheckListOrdersIsNotFound $checkList)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
        $this->checkList = $checkList;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function execute(): array
    {
        $orders = $this->dropShippingOrderRepository->showOrdersWithStatusPaidOut();

        return $this->checkList->execute($orders);
    }
}
