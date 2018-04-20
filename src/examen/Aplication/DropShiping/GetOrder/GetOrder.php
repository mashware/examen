<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:34
 */
namespace  App\examen\Aplication\DropShiping\GetOrder;
use App\examen\Infrastructure\Domain\Model\Repository\OrderRepository;

class GetOrder
{
    private $getOrderRepository;
    private $dataTransformer;

    public function __construct(OrderRepository $getOrderRepository, DataTransformerJSON $dataTransformer)
    {
        $this->getOrderRepository = $getOrderRepository;
        $this->dataTransformer = $dataTransformer;
    }

    public function handler(GetOrderCommand $command)
    {
        return $this->dataTransformer->transform($this->getOrderRepository->getAllOrders());
    }

}