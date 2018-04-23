<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 21/04/2018
 * Time: 22:30
 */

namespace App\Domain\Service;


use App\Domain\Model\Entity\Interfaces\OrderNotFoundException;

class CheckIfOrdersExist
{
    /**
     * @param array $orders
     * @return array
     * @throws \Exception
     */
    public function execute(array $orders): array
    {
        if (0 === count($orders)) {
            throw new OrderNotFoundException('No se encontraron pedidos');
        }
        return $orders;
    }
}
