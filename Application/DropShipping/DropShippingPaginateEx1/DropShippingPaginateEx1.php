<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 14:12
 */

namespace Application\DropShipping\DropShippingPaginateEx1;

use Infrastructure\Repository\OrderEntityRepository;
use Application\DropShipping\DropShippingPaginateEx1\Interfaces\DataTransformerPaginateEx1Interface;

class DropShippingPaginateEx1
{
    public const NUMORDERSPERPAGE = 5;

    private $orderEntityRepository;
    private $dataTransformerPaginateEx1;

    /**
     * DropShippingPaginateEx1 constructor.
     *
     * @param OrderEntityRepository               $orderEntityRepository
     * @param DataTransformerPaginateEx1Interface $dataTransformerPaginateEx1
     */
    public function __construct(
        OrderEntityRepository $orderEntityRepository,
        DataTransformerPaginateEx1Interface $dataTransformerPaginateEx1
    ) {
        $this->orderEntityRepository = $orderEntityRepository;
        $this->dataTransformerPaginateEx1 = $dataTransformerPaginateEx1;
    }

    /**
     * @param DropShippingPaginateEx1Command $dropShippingPaginateEx1Command
     *
     * @return array
     */
    public function execute(DropShippingPaginateEx1Command $dropShippingPaginateEx1Command): array
    {
        $queryOutput = $this->orderEntityRepository->returnPaidOrders();

        return (new DataTransformerPaginateEx1())->execute($queryOutput, $dropShippingPaginateEx1Command->getPage());
    }
}