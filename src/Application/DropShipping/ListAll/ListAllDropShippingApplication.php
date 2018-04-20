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


class ListAllDropShippingApplication
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
        $dropShippingOrders = $this->dropShippingRepository->findAll();
        $dropShippingOrders = $this->DataTransformToArrayForAllList
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}
