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

class ResetOrderGivenNumberAndArticle
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
    public function handle(ResetOrderGivenNumberAndArticleCommand $resetOrderGivenNumberAndArticleCommand): array
    {

        $dropShippingOrders = $this->dropShippingRepository
            ->findByOrderNumberAndArticle(
                $resetOrderGivenNumberAndArticleCommand->getOrderNumber(),
                $resetOrderGivenNumberAndArticleCommand->getArticle()
            );

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

