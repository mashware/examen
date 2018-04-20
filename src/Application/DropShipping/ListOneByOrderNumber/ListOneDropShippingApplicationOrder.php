<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:44
 */

namespace App\Application\DropShipping\ListOneByOrderNumber;

use App\Application\DropShipping\Util\DataTransform\DataTransformInterface;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;

class ListOneDropShippingApplicationOrder
{
    private $dataTransformToArray;
    private $dropShippingRepository;

    public function __construct(
        DataTransformInterface $dataTransformToArray,
        DropShippingPedidosRepositoryInterface $dropShippingDoctrineRepository
    ) {
        $this->dataTransformToArray = $dataTransformToArray;
        $this->dropShippingRepository = $dropShippingDoctrineRepository;
    }

    public function handle(int $orderNumber): array
    {
        $dropShippingOrders = $this->dropShippingRepository->findByOrderNumber($orderNumber);
        $dropShippingOrders = $this->dataTransformToArray
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}