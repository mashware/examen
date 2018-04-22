<?php

namespace Javier\Exam\Application\Order\ChangeProviderByIdAndArticle;

use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;

class ChangeProviderByIdAndArticle
{
    private $dropShippingOrderRepository;
    private $checkListOrders;
    private $changeProviderByIdAndArticleTransform;

    public function __construct(DropShippingOrderRepositoryInterface $dropShippingOrderRepository,
                                CheckListOrdersIsNotFound $checkListOrders,
                                ChangeProviderByIdAndArticleTransformInterface $changeProviderByIdAndArticleTransform)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
        $this->checkListOrders = $checkListOrders;
        $this->changeProviderByIdAndArticleTransform = $changeProviderByIdAndArticleTransform;
    }

    /**
     * @param ChangeProviderByIdAndArticleCommand $changeProviderByIdAndArticleCommand
     * @return array
     * @throws \Exception
     */
    public function execute(ChangeProviderByIdAndArticleCommand $changeProviderByIdAndArticleCommand): array
    {
        $orders = $this->dropShippingOrderRepository->changeProviderOrdersByIdAndArticle(
            $changeProviderByIdAndArticleCommand->id(),
            $changeProviderByIdAndArticleCommand->article(),
            $changeProviderByIdAndArticleCommand->provider()
        );

        return $this->changeProviderByIdAndArticleTransform->transform(
            $this->checkListOrders->execute($orders)
        );
    }
}
