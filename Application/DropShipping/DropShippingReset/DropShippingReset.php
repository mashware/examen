<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping\DropShippingReset;

use Infrastructure\Repository\OrderEntityRepository;

class DropShippingReset
{

    private $orderEntityRepository;

    /**
     * DropShippingReset constructor.
     *
     * @param OrderEntityRepository $orderEntityRepository
     */
    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    /**
     * @param DropShippingResetCommand $dropShippingResetCommand
     */
    public function execute(DropShippingResetCommand $dropShippingResetCommand): void
    {
        $this->orderEntityRepository->reset(
            $dropShippingResetCommand->getOrder(),
            $dropShippingResetCommand->getArticle()
        );
    }
}