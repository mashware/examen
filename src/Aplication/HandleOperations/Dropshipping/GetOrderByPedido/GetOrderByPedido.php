<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:24
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido;


use App\Entity\NotFindDropshippingOrderException;
use App\Infraestructure\Repository\DropshippingPedidos;

class GetOrderByPedido
{
    private $repository;
    private $dataTransform;
    /**
     * GetOrderByPedido constructor.
     * @param $repository
     */
    public function __construct(DropshippingPedidos $repository, GetOrderDataTransform $dataTransform)
    {
        $this->dataTransform = $dataTransform;
        $this->repository = $repository;
    }

    public function execute(GetOrderCommand $orderCommand)
    {
        $order = $this->repository->getOrderByPedido($orderCommand->getIdPedido());

        if(null === $order){
            throw new NotFindDropshippingOrderException('Pedido no encontrado');
        }

        return $this->dataTransform->transform($order);
    }
}
