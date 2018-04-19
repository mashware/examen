<?php

namespace Javier\Exam\Application\Order\OrderGivenById;

use Javier\Exam\Domain\Model\Order\DropShippingOrderInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class OrderGivenById
{
    private $dropShippingOrderRepository;

    public function __construct(DropShippingOrderInterface $dropShippingOrder, CheckListOrdersIsNotFound $checkList)
    {
        $this->dropShippingOrderRepository = $dropShippingOrder;
        $this->checkList = $checkList;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function execute(OrderGivenByIdCommand $orderGivenByIdCommand): array
    {
        $orders = $this->dropShippingOrderRepository->showOrderById($orderGivenByIdCommand->getId());

        return $this->checkList->execute($orders);
    }
}
