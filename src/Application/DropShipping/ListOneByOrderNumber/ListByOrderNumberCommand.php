<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 12:52
 */

namespace App\Application\DropShipping\ListOneByOrderNumber;


class ListByOrderNumberCommand
{
    private $orderNumber;

    public function __construct(int $orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return int
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }
}
