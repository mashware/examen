<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping;

use App\Domain\Entity\EmptyQueryOutputException;
use App\Domain\Service\EmptyValidator;
use Infrastructure\Repository\OrderEntityRepository;

class DropShipping
{

    private $orderEntityRepository;

    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    public function execute(EmptyValidator $emptyValidator): array
    {
        $queryOutput = $this->orderEntityRepository->returnPaidOrders();

        if ($emptyValidator->execute($queryOutput)) {
            throw new EmptyQueryOutputException();
        }

        return $queryOutput;
    }
}