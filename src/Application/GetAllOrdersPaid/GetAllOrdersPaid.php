<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:29
 */

namespace App\Application\GetAllOrdersPaid;


use App\Infrastructure\Entity\DropShipping\Repository\OrderDropShippingDoctrineRepository;

class GetAllOrdersPaid
{

    private $orderRepository;
    private $dataTransform;

    public function __construct(OrderDropShippingDoctrineRepository $orderRepository, DataTransform $dataTransform)
    {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
    }

    public function handler(GetAllOrdersPaidCommand $command)
    {
       return $this->dataTransform->transform($this->orderRepository->allPaid());
    }
}