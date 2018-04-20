<?php

namespace App\Application\DropShipping\GetOrder;

class DataTransformJson implements DataTransform
{

    public function transform($products)
    {
        $arra = [];
        foreach ($products as $produc){
            $arra[$produc->getId()] = [
                "Order number" => $produc->getPedido(),
                "Status" => $produc->getEstado(),
                "date_sincronize" => $produc->getFechaEnvioPrevistaMin()
            ];
        }
        return $arra;
    }
}