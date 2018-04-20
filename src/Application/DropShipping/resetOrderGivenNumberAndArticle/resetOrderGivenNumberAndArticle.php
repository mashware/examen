<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 13:31
 */

namespace App\Application\DropShipping\resetOrderGivenNumberAndArticle;


use App\Domain\Model\Entity\DropShippingPedidos;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;

class resetOrderGivenNumberAndArticle
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
     * @return array|DropShippingPedidos[] $dropShippingOrders
     */
    public function handle(int $orderNumber, int $article): array
    {

        $dropShippingOrders = $this->dropShippingRepository->findByOrderNumberAndArticle($orderNumber, $article);

        foreach ($dropShippingOrders as $order) {
            $order->setEstado("nuevo");
            $order->setPedidoProveedor(0);
            $order->setAlmacen(0);
            $order->setIdProveedor(0);

            $this->dropShippingRepository->persistAndFlush($order);
        }



        return  $dropShippingOrders;
    }
}

