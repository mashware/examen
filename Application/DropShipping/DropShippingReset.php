<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 13:12
 */

namespace Application\DropShipping;

use App\Domain\Entity\EmptyQueryOutputException;
use App\Domain\Entity\OrderEntity;
use App\Domain\Service\DataTransformerReturnPaidOrders;
use App\Domain\Service\EmptyQueryOutputValidator;
use App\Domain\Service\Interfaces\Validable;
use App\Domain\Service\ResetService;
use Infrastructure\Repository\OrderEntityRepository;

class DropShippingReset
{

    private $orderEntityRepository;

    /**
     * DropShippingReset constructor.
     * @param OrderEntityRepository $orderEntityRepository
     */
    public function __construct(OrderEntityRepository $orderEntityRepository)
    {
        $this->orderEntityRepository = $orderEntityRepository;
    }

    /**
     * @param Validable $validator
     * @param ResetService $resetService
     * @param string $order
     * @param string $article
     * @throws EmptyQueryOutputException
     */
    public function execute(Validable $validator, ResetService $resetService, string $order, string $article): void
    {
        $orderEntity = $this->orderEntityRepository->findOneBy(
            [
                'pedido' => $order,
                'id_articulo' => $article
            ]
        );

        if ($validator->validate($orderEntity)) {
            throw new EmptyQueryOutputException();
        }

        $resetService->execute($orderEntity);

        $this->orderEntityRepository->persist($orderEntity);
    }
}