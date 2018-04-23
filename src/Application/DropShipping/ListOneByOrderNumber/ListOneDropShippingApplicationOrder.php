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
use App\Domain\Service\CheckIfOrdersExist;

class ListOneDropShippingApplicationOrder
{
    private $dataTransformToArray;
    private $dropShippingRepository;
    private $checkIfOrdersExist;

    public function __construct(
        DataTransformInterface $dataTransformToArray,
        DropShippingPedidosRepositoryInterface $dropShippingDoctrineRepository,
        CheckIfOrdersExist $checkIfOrdersExist
    ) {
        $this->dataTransformToArray = $dataTransformToArray;
        $this->dropShippingRepository = $dropShippingDoctrineRepository;
        $this->checkIfOrdersExist = $checkIfOrdersExist;
    }

    public function handle(ListByOrderNumberCommand $listByOrderNumberCommand): array
    {
        $dropShippingOrders = $this->dropShippingRepository
            ->findByOrderNumber($listByOrderNumberCommand->getOrderNumber());
        $dropShippingOrders = $this->checkIfOrdersExist->execute($dropShippingOrders);
        $dropShippingOrders = $this->dataTransformToArray
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}