<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:42
 */

namespace App\Application\OrdersPerPage;


use App\Infrastructure\Entity\DropShipping\Repository\OrderDropShippingDoctrineRepository;

class OrdersPerPage
{
    private $orderRepository;
    private $dataTransform;

    public function __construct(OrderDropShippingDoctrineRepository $orderRepository, OrdersPerPageDataTransform $dataTransform)
    {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
    }

    public function handler(OrdersPerPageCommand $command)
    {
        return $this->dataTransform->transform($this->orderRepository->allOrdersPaidPage($command->getPage(), $command->getOrdersPerPage()));
    }
}