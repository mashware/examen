<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 20/04/18
 * Time: 10:42
 */

namespace Application\DropShipping\DropShippingReturnPaidOrders;

use Application\DropShipping\DropShippingReturnPaidOrders\Interfaces\DataTransformerReturnPaidOrdersInterface;

class DataTransformerReturnPaidOrders implements DataTransformerReturnPaidOrdersInterface
{
    public function execute(array $dataInput): array
    {
        $dataOutput = [];
        foreach ($dataInput as $order) {
            $dataOutput[] = [
                $order["pedido"],
                [
                    "pedido" => $order["pedido"],
                    "estado" => $order["estado"],
                    "fecha_sincronizado" => $order["fecha_sincronizado"]
                ]
            ];
        }

        return $dataOutput;
    }
}