<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping;

use App\Domain\Entity\EmptyQueryOutputException;
use App\Domain\Service\DataTransformerReturnPaidOrders;
use App\Domain\Service\EmptyQueryOutputValidator;
use App\Domain\Service\Interfaces\Validable;
use Infrastructure\Repository\OrderEntityRepository;

class DropShipping
{
    /**
     * @var OrderEntityRepository
     */
    private $orderEntityRepository;
    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    /**
     * @param Validable $validator
     * @param DataTransformerReturnPaidOrders $dataTransformerReturnPaidOrders
     * @return array
     * @throws EmptyQueryOutputException
     */
    public function execute(Validable $validator, DataTransformerReturnPaidOrders $dataTransformerReturnPaidOrders): array
    {
        $queryOutput = $dataTransformerReturnPaidOrders
            ->execute(
                $this->orderEntityRepository
                ->returnPaidOrders()
            );

        if ($validator->validate($queryOutput)) {
            throw new EmptyQueryOutputException();
        }

        return $queryOutput;
    }
}
