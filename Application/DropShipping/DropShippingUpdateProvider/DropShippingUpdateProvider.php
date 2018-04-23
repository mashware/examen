<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 10:28
 */

namespace Application\DropShipping\DropShippingUpdateProvider;

use Infrastructure\Repository\OrderEntityRepository;

class DropShippingUpdateProvider
{
    private $orderEntityRepository;

    /**
     * DropShippingUpdateProvider constructor.
     *
     * @param OrderEntityRepository $orderEntityRepository
     */
    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    /**
     * @param DropShippingUpdateProviderCommand $dropShippingUpdateProviderCommand
     */
    public function execute(DropShippingUpdateProviderCommand $dropShippingUpdateProviderCommand)
    {
        $this->orderEntityRepository->changeProvider(
            $dropShippingUpdateProviderCommand->getOrder(),
            $dropShippingUpdateProviderCommand->getArticle(),
            $dropShippingUpdateProviderCommand->getProvider()
        );
    }
}