<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 17:46
 */

namespace App\Application\DropShipping\NewProviderGivenNewProviderOrderNumberAndArticle;


use App\Domain\Model\Entity\DropShippingPedidos;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;

class NewProviderGivenNewProviderOrderNumberAndArticle
{


    private $dropShippingRepository;

    public function __construct(
        DropShippingPedidosRepositoryInterface $dropShippingDoctrineRepository
    ) {
        $this->dropShippingRepository = $dropShippingDoctrineRepository;
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

        foreach ($dropShippingOrders as $order) {
            $order->setIdProveedor(
                $newProviderGivenOrderNumbeAndArticleCommand->getProvider()
            );

            $this->dropShippingRepository->persistAndFlush($order);
        }



        return  $dropShippingOrders;
    }
}
