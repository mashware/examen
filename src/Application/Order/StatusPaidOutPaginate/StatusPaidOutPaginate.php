<?php

namespace Javier\Exam\Application\Order\StatusPaidOutPaginate;

use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class StatusPaidOutPaginate
{
    private const TOTAL_ORDERS_PER_PAGE = 10;

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
        $orders = $this->dropShippingOrderRepository->showOrdersWithStatusPaidOut();

        $ordersPages = array_chunk($orders, self::TOTAL_ORDERS_PER_PAGE);
        $numberOfPages = count($ordersPages);
        $page = $paidOutPaginateCommand->page($numberOfPages);

        return $this->ordersStatusPaidOutPaginateTransform->transform(
            $this->checkListOrders->execute(
                $ordersPages[$page - 1]
            )
        );
    }
}
