<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:58
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetPaidOrders;


use App\Entity\NotFindDropshippingOrderException;
use App\Infraestructure\Repository\DropshippingPedidos;

class SelectByPayOutOrders
{
    private $repository;
    private $ordersTransform;
    /**
     * SelectAllOrders constructor.
     * @param $repository
     */
    public function __construct(DropshippingPedidos $repository, OrdersTransform $ordersTransform)
    {
        $this->repository = $repository;
        $this->ordersTransform = $ordersTransform;
    }


    public function execute()
    {
        $paidOrders = $this->repository->getPaidOrders();

        if(null == $paidOrders){
            throw new NotFindDropshippingOrderException("Pedido no encontrado");
        }

        return $this->ordersTransform->toArray($paidOrders);
    }
}