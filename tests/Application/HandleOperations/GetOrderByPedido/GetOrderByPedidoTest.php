<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 9:04
 */

namespace App\Tests\Application\HandleOperations\GetOrderByPedido;

use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderByPedido;
use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderCommand;
use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderDataTransform;
use App\Entity\DropshippingPedidos;
use App\Entity\NotFindDropshippingOrderException;
use App\Repository\DropshippingPedidosRepository;
use PHPUnit\Framework\MockObject\MockObject;

class GetOrderByPedidoTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var MockObject
     */
    private $dropshippingRepository;
    private $dataTransform;
    private $dropshippingEntity;

    public function setUp()
    {
        $this->dropshippingRepository = $this
            ->getMockBuilder(DropshippingPedidosRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->dataTransform = new GetOrderDataTransform();

        $this->dropshippingEntity = new DropshippingPedidos(
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
    }

    /**
     * @test
     */
    public function given_GetOrderByPedido_when_get_a_unexist_then_exception()
    {

        $this->expectException(NotFindDropshippingOrderException::class);

        (new GetOrderByPedido($this->dropshippingRepository, $this->dataTransform))->execute(new GetOrderCommand(1));
    }

    /**
     * @test
     */
    public function given_GetOrderByPedido_when_get_a_exist_idPedido_then_return_order()
    {

        $this->dropshippingRepository->method('getOrderByPedido')->willReturn($this->dropshippingEntity);

        $order = (new GetOrderByPedido($this->dropshippingRepository, $this->dataTransform))->execute(new GetOrderCommand(1));

        $this->assertEquals($this->dropshippingEntity->getPedido(), $order['pedido']);
    }

}