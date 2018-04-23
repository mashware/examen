<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:58
 */

namespace App\Application\GetAnOrderWithOrderId;

use Assert\Assertion;

class GetAnOrderWithOrderIdCommand
{

    private $orderId;

    /**
     * GetAnOrderWithOrderIdCommand constructor.
     * @param $orderId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($orderId)
    {
        Assertion::numeric($orderId);
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }


}