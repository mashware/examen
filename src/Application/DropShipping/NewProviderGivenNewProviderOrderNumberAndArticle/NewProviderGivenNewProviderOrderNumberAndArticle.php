<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 17:46
 */

namespace App\Application\DropShipping\NewProviderGivenNewProviderOrderNumberAndArticle;


use App\Application\DropShipping\Util\DataTransform\DataTransformToArrayForAllList;
use App\Domain\Model\Entity\DropShippingPedidos;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;
use App\Domain\Service\CheckIfOrdersExist;

class NewProviderGivenNewProviderOrderNumberAndArticle
{

    private $dataTransformToArrayForAllList;
    private $dropShippingRepository;
    private $checkIfOrdersExist;

    public function __construct(
        DataTransformToArrayForAllList $dataTransformToArrayForAllList,
        DropShippingPedidosRepositoryInterface $dropShippingDoctrineRepository,
        CheckIfOrdersExist $checkIfOrdersExist
    ) {
        $this->dataTransformToArrayForAllList = $dataTransformToArrayForAllList;
        $this->dropShippingRepository = $dropShippingDoctrineRepository;
        $this->checkIfOrdersExist = $checkIfOrdersExist;
    }

    /**
     * @return array|DropShippingPedidos[] $dropShippingOrders
     */
    public function handle(
        NewProviderGivenOrderNumbeAndArticleCommand $newProviderGivenOrderNumbeAndArticleCommand
    ): array {

        $dropShippingOrders = $this->dropShippingRepository
            ->findByOrderNumberAndArticle(
                $newProviderGivenOrderNumbeAndArticleCommand->getOrderNumber(),
                $newProviderGivenOrderNumbeAndArticleCommand->getArticle()
            );

        $dropShippingOrders = $this->checkIfOrdersExist->execute($dropShippingOrders);

        foreach ($dropShippingOrders as $order) {
            $order->setIdProveedor(
                $newProviderGivenOrderNumbeAndArticleCommand->getProvider()
            );

            $this->dropShippingRepository->persistAndFlush($order);
        }

        $dropShippingOrders = $this->dataTransformToArrayForAllList->execute($dropShippingOrders);

        return  $dropShippingOrders;
    }
}
