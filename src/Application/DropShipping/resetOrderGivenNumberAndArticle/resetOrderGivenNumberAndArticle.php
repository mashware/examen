<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 13:31
 */

namespace App\Application\DropShipping\resetOrderGivenNumberAndArticle;


use App\Application\DropShipping\Util\DataTransform\DataTransformToArrayForAllList;
use App\Domain\Model\Entity\DropShippingOrderStatus;
use App\Domain\Model\Entity\DropShippingPedidos;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;
use App\Domain\Service\CheckIfOrdersExist;

class ResetOrderGivenNumberAndArticle
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
    public function handle(ResetOrderGivenNumberAndArticleCommand $resetOrderGivenNumberAndArticleCommand): array
    {

        $dropShippingOrders = $this->dropShippingRepository
            ->findByOrderNumberAndArticle(
                $resetOrderGivenNumberAndArticleCommand->getOrderNumber(),
                $resetOrderGivenNumberAndArticleCommand->getArticle()
            );

        $dropShippingOrders =$this->checkIfOrdersExist->execute($dropShippingOrders);

        foreach ($dropShippingOrders as $order) {
            $order->setEstado(DropShippingOrderStatus::STATUS_NEW);
            $order->setPedidoProveedor(0);
            $order->setAlmacen(0);
            $order->setIdProveedor(0);

            $this->dropShippingRepository->persistAndFlush($order);
        }

        $dropShippingOrders = $this->dataTransformToArrayForAllList->execute($dropShippingOrders);

        return  $dropShippingOrders;
    }
}

