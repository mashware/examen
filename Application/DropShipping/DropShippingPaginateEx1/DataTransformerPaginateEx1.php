<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:39
 */

namespace Application\DropShipping\DropShippingPaginateEx1;

use Application\DropShipping\DropShippingPaginateEx1\Interfaces\DataTransformerPaginateEx1Interface;

class DataTransformerPaginateEx1 implements DataTransformerPaginateEx1Interface
{
    /**
     * @param array $dataInput
     * @param       $page
     *
     * @return array
     */
    public function execute(array $dataInput, $page): array
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

        return array_slice($dataOutput, DropShippingPaginateEx1::NUMORDERSPERPAGE*($page-1), DropShippingPaginateEx1::NUMORDERSPERPAGE);
    }
}