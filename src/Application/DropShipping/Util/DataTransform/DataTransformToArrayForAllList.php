<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:28
 */

namespace App\Application\DropShipping\Util\DataTransform;


use App\Domain\Model\Entity\DropShippingPedidos;

class DataTransformToArrayForAllList implements DataTransformInterface
{

    /**
     * @param array|DropShippingPedidos[] $dropShippingOrders
     * @return array
     */

    public function execute(array $dropShippingOrders): array
    {
        $orderedArray = [];

        foreach ($dropShippingOrders as $value) {
            $orderedArray [] = [
                (string) $value->getPedido() => array(
                    "orderNumber" => $value->getPedido(),
                    "status" => $value->getEstado(),
                    "date_sincronize" => $value
                        ->getFechaSincronizado()
                )
            ];
        }
        return $orderedArray;
    }

}