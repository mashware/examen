<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 9:03
 */

namespace App\Application\DropShipping\ListAllPaid;


use App\Application\DropShipping\Util\DataTransform\DataTransformInterface;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;
use App\Domain\Service\CheckIfOrdersExist;

class ListAllPaidDropShippingApplication
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

    public function handle(ListAllPaidCommand $listAllPaidCommand): array
    {
        $dropShippingOrders = $this->dropShippingRepository->findAllPaidStatusByPage($listAllPaidCommand->getPage());

        $dropShippingOrders = $this->checkIfOrdersExist->execute($dropShippingOrders);

        $dropShippingOrders = $this->DataTransformToArrayForAllList
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}