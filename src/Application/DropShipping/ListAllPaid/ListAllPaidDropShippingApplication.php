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

class ListAllPaidDropShippingApplication
{
    private $DataTransformToArrayForAllList;
    private $dropShippingRepository;

    public function __construct(
        DataTransformInterface $DataTransformToArrayForAllList,
        DropShippingPedidosRepositoryInterface $dropShippingPedidosDoctrineRepository
    ) {
        $this->DataTransformToArrayForAllList = $DataTransformToArrayForAllList;
        $this->dropShippingRepository = $dropShippingPedidosDoctrineRepository;
    }

    public function handle(): array
    {
        $dropShippingOrders = $this->dropShippingRepository->findAllPaidStatus();
        $dropShippingOrders = $this->DataTransformToArrayForAllList
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}