<?php

namespace Javier\Exam\Application\Order\ResetByIdAndArticle;

use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class ResetByIdAndArticle
{
    private $dropShippingOrderRepository;
    private $checkListOrders;
    private $resetOrdersTransform;

    public function __construct(DropShippingOrderRepositoryInterface $dropShippingOrderRepository,
                                CheckListOrdersIsNotFound $checkListOrders,
                                ResetByIdAndArticleTransformInterface $resetOrdersTransform)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
        $this->checkListOrders = $checkListOrders;
        $this->resetOrdersTransform = $resetOrdersTransform;
    }

    /**
     * @param ResetByIdAndArticleCommand $resetOrdersGivenByIdAndArticleCommand
     * @return array
     * @throws \Exception
     */
    public function execute(ResetByIdAndArticleCommand $resetOrdersGivenByIdAndArticleCommand): array
    {
        $orders = $this->dropShippingOrderRepository->resetOrdersByIdAndArticle(
            $resetOrdersGivenByIdAndArticleCommand->id(),
            $resetOrdersGivenByIdAndArticleCommand->article()
        );

        return $this->resetOrdersTransform->transform(
            $this->checkListOrders->execute($orders)
        );
    }
}
