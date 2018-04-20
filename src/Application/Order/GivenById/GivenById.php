<?php

namespace Javier\Exam\Application\Order\GivenById;

use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class GivenById
{
    private $dropShippingOrderRepository;
    private $checkListOrders;
    private $orderGivenByIdTransform;

    public function __construct(DropShippingOrderRepositoryInterface $dropShippingOrderRepository,
                                CheckListOrdersIsNotFound $checkListOrders,
                                GivenByIdTransformInterface $orderGivenByIdTransform)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
        $this->checkListOrders = $checkListOrders;
        $this->orderGivenByIdTransform = $orderGivenByIdTransform;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function execute(GivenByIdCommand $orderGivenByIdCommand): array
    {
        $orders = $this->dropShippingOrderRepository->showOrderById(
            $orderGivenByIdCommand->id()
        );

        return $this->orderGivenByIdTransform
            ->transform(
                $this->checkListOrders->execute($orders)
            );
    }
}
