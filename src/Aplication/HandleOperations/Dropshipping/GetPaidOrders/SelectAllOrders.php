<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:58
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetPaidOrders;

use App\Infraestructure\Repository\DropshippingPedidos;




class SelectAllOrders
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
        return $this->ordersTransform->toArray($this->repository->selectAllOrders());
    }
}