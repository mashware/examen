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
     * @param int $orderNumber
     * @param int $article
     * @param int $provider
     * @return array|DropShippingPedidos[] $dropShippingOrders
     */
    public function handle(int $orderNumber, int $article, int $provider): array
    {

        $dropShippingOrders = $this->dropShippingRepository->findByOrderNumberAndArticle($orderNumber, $article);

        foreach ($dropShippingOrders as $order) {
            $order->setIdProveedor($provider);

            $this->dropShippingRepository->persistAndFlush($order);
        }



        return  $dropShippingOrders;
    }
}
