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

class GetPaidOrders
{
    private $repository;
    private $ordersTransform;
    /**
     * SelectAllOrders constructor.
     * @param $repository
     */
    public function __construct(DropshippingPedidos $repository, GetPaidOrdersTransform $ordersTransform)
    {
        $this->repository = $repository;
        $this->ordersTransform = $ordersTransform;
    }


    public function execute()
    {
        $paidOrders = $this->repository->getPaidOrders();

        if(null == $paidOrders){
            throw new NotFindDropshippingOrderException("No existen pedidos");
        }

        return $this->ordersTransform->transform($paidOrders);
    }
}