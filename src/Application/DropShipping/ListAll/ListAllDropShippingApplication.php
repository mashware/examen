<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:27
 */

namespace App\Application\DropShipping\ListAll;


use App\Application\DropShipping\Util\DataTransform\DataTransformInterface;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;
use App\Domain\Service\CheckIfOrdersExist;


class ListAllDropShippingApplication
{
    private $DataTransformToArrayForAllList;
    private $dropShippingRepository;
    private $checkIfOrdersExist;

    public function __construct(
        DataTransformInterface $DataTransformToArrayForAllList,
        DropShippingPedidosRepositoryInterface $dropShippingPedidosDoctrineRepository,
        CheckIfOrdersExist $checkIfOrdersExist
    ) {
        $this->DataTransformToArrayForAllList = $DataTransformToArrayForAllList;
        $this->dropShippingRepository = $dropShippingPedidosDoctrineRepository;
        $this->checkIfOrdersExist = $checkIfOrdersExist;
    }

    public function handle(ListAllCommand $listAllCommand): array
    {
        $dropShippingOrders = $this->dropShippingRepository->findAll();

        $dropShippingOrders = $this->checkIfOrdersExist->execute($dropShippingOrders);

        $dropShippingOrders = $this->DataTransformToArrayForAllList
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}
