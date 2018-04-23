<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:58
 */

namespace App\Application\GetAnOrderWithOrderId;


class GetAnOrderWithOrderIdCommand
{

    private $orderId;

    public function __construct(int $orderId)
    {
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