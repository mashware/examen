<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping\DropShippingReturnPaidOrders;

use App\Domain\Entity\EmptyQueryOutputException;
use Application\DropShipping\DropShippingReturnPaidOrders\Interfaces\DataTransformerReturnPaidOrdersInterface;
use Infrastructure\Repository\OrderEntityRepository;

class DropShippingReturnPaidOrders
{
    private $orderEntityRepository;
    private $dataTransformerReturnPaidOrders;

    /**
     * DropShipping constructor.
     *
     * @param OrderEntityRepository           $orderEntityRepository
     * @param DataTransformerReturnPaidOrders $dataTransformerReturnPaidOrders
     */
    public function __construct(
        OrderEntityRepository $orderEntityRepository,
        DataTransformerReturnPaidOrdersInterface $dataTransformerReturnPaidOrders
    ) {
        $this->orderEntityRepository = $orderEntityRepository;
        $this->dataTransformerReturnPaidOrders = $dataTransformerReturnPaidOrders;
    }

    /**
     * @return array
     */
    public function execute(): array
    {
        $queryOutput = $this->dataTransformerReturnPaidOrders
            ->execute(
                $this->orderEntityRepository
                ->returnPaidOrders()
            );

        if (empty($queryOutput)) {
            throw new EmptyQueryOutputException();
        }

        return $queryOutput;
    }
}
