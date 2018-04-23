<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping;

use Infrastructure\Repository\OrderEntityRepository;

class DropShippingReturnOrder
{

    private $orderEntityRepository;

    /**
     * DropShippingReturnOrder constructor.
     *
     * @param OrderEntityRepository $orderEntityRepository
     */
    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    /**
     * @param DropShippingReturnOrderCommand $dropShippingReturnOrderCommand
     *
     * @return array
     */
    public function execute(DropShippingReturnOrderCommand $dropShippingReturnOrderCommand): array
    {
        $queryOutput = $this->orderEntityRepository->returnOrder($dropShippingReturnOrderCommand->getOrder());

        return $queryOutput;
    }
}