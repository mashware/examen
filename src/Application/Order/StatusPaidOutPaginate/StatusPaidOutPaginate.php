<?php

namespace Javier\Exam\Application\Order\StatusPaidOutPaginate;

use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class StatusPaidOutPaginate
{
    private $dropShippingOrderRepository;
    private $checkListOrders;
    private $ordersStatusPaidOutPaginateTransform;

    public function __construct(DropShippingOrderRepositoryInterface $dropShippingOrderRepository,
                                CheckListOrdersIsNotFound $checkListOrders,
                                StatusPaidOutPaginateTransformInterface $ordersStatusPaidOutPaginateTransform)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
        $this->checkListOrders = $checkListOrders;
        $this->ordersStatusPaidOutPaginateTransform = $ordersStatusPaidOutPaginateTransform;
    }

    /**
     * @param StatusPaidOutPaginateCommand $paidOutPaginateCommand
     * @return array
     * @throws \Exception
     */
    public function execute(StatusPaidOutPaginateCommand $paidOutPaginateCommand): array
    {
        $orders = $this->dropShippingOrderRepository
            ->showOrdersWithStatusPaidOutPaginate($paidOutPaginateCommand->page());

        return $this->ordersStatusPaidOutPaginateTransform->transform(
            $this->checkListOrders->execute(
                $orders
            )
        );
    }
}
