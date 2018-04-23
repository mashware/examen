<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:56
 */

namespace App\Application\GetAnOrderWithOrderId;

use App\Domain\Entity\DropShipping\OrderNotFoundException;
use App\Infrastructure\Entity\DropShipping\Repository\OrderDropShippingDoctrineRepository;
use Symfony\Component\HttpFoundation\Response;

class GetAnOrderWithOrderId
{

    private $orderRepository;
    private $dataTransform;

    public function __construct(OrderDropShippingDoctrineRepository $orderRepository, GetAnOrderWithOrderIdDataTransform $dataTransform)
    {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
    }

    public function handler(GetAnOrderWithOrderIdCommand $command)
    {
        try {
            $order = $this->orderRepository->getAnOrderWithOrderIdOrFail($command->getOrderId());
        } catch (OrderNotFoundException $e) {
            return $this->dataTransform->transform(['message' => 'Product Not Found', 'status' => Response::HTTP_NOT_FOUND]);
        }
        return $this->dataTransform->transform(['message' => 'OK', 'status' => Response::HTTP_OK, 'data' => $order]);
    }
}