<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:15
 */

namespace App\Tests\Application\HandleOperations\GetOrderByPedido;


use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderDataTransform;
use App\Entity\DropshippingPedidos;
use PHPUnit\Framework\TestCase;

class GetOrderDataTransformTest extends TestCase
{
    /**
     * @test
     */
    public function given_GerOrderDataTransform_when_get_a_DropshippingOrder_object_then_return_array()
    {
        $dropshipping = new DropshippingPedidos(
            1,
            2,
            new \DateTime(),
            "PAGADO",
            new \DateTime(),
            new \DateTime(),
            new \DateTime(),
            new \DateTime(),
            23,
            23,
            'tourline',
            0,
            'etiqueta',
            0
        );

        $dropshippingOrder = (new GetOrderDataTransform())->transform($dropshipping);

        $this->assertCount(15,$dropshippingOrder);
        $this->assertInternalType('array',$dropshippingOrder);
    }
}