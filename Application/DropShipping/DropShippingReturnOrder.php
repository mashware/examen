<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping;

use App\Domain\Entity\EmptyQueryOutputException;
use App\Domain\Service\Interfaces\Validable;
use Infrastructure\Repository\OrderEntityRepository;

class DropShippingReturnOrder
{

    private $orderEntityRepository;

    /**
     * DropShippingReturnOrder constructor.
     * @param OrderEntityRepository $orderEntityRepository
     */
    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    /**
     * @param Validable $validator
     * @param string $order
     * @return array
     * @throws EmptyQueryOutputException
     */
    public function execute(Validable $validator, string $order): array
    {
        $queryOutput = $this->orderEntityRepository->returnOrder($order);

        if ($validator->validate($queryOutput)) {
            throw new EmptyQueryOutputException();
        }

        return $queryOutput;
    }
}