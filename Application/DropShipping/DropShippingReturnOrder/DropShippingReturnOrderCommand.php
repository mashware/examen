<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 13:15
 */

namespace Application\DropShipping\DropShippingReturnOrder;

use Assert\Assertion;

class DropShippingReturnOrderCommand
{
    private $order;
    public function __construct($order)
    {
        Assertion::notBlank($order, 'Tienes que especificar un id de pedido');
        Assertion::numeric($order, 'El id del pedido no es un número');

        $this->order = $order;
    }

    /**
     * Get Order
     *
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }
}