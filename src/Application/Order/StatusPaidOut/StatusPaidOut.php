<?php

namespace Javier\Exam\Application\Order\StatusPaidOut;

use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class StatusPaidOut
{
    private $dropShippingOrderRepository;
    private $checkListOrders;
    private $ordersStatusPaidOutTransform;

    public function __construct(DropShippingOrderRepositoryInterface $dropShippingOrderRepository,
                                CheckListOrdersIsNotFound $checkListOrders,
                                StatusPaidOutTransformInterface $ordersStatusPaidOutTransform)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
        $this->checkListOrders = $checkListOrders;
        $this->ordersStatusPaidOutTransform = $ordersStatusPaidOutTransform;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function execute(StatusPaidOutCommand $paidOutCommand): array
    {
        $orders = $this->dropShippingOrderRepository->showOrdersWithStatusPaidOut();

        return $this->ordersStatusPaidOutTransform
            ->transform(
                $this->checkListOrders->execute($orders)
            );
    }
}
