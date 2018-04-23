<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 9:46
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido;


use App\Entity\DropshippingPedidos;

interface GetOrderByPedidoDataTransform
{
    public function transform(DropshippingPedidos $dropshippingPedidos):array;
}