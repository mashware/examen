<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:21
 */

namespace App\Application\Order\ListOneOrder;

use Assert\Assertion;

class ListOneOrderCommand
{
    private $order;

    /**
     * ListOneOrderCommand constructor.
     * @param $order
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($order)
    {
        Assertion::numeric($order, 'Debes insertar un número');
        $this->order = $order;
    }

    public function order()
    {
        return $this->order;
    }
}
