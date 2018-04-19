<?php

namespace Javier\Exam\Application\Order\ResetOrdersGivenByIdAndArticle;

use Javier\Exam\Domain\Model\Order\DropShippingOrderInterface;

class ResetOrdersGivenByIdAndArticle
{
    private $dropShippingOrderRepository;

    public function __construct(DropShippingOrderInterface $dropShippingOrderRepository)
    {
        $this->dropShippingOrderRepository = $dropShippingOrderRepository;
    }

    public function execute(ResetOrdersGivenByIdAndArticleCommand $resetOrdersGivenByIdAndArticleCommand): void
    {

    }
}
