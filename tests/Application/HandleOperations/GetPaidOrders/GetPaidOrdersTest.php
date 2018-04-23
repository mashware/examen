<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 13:03
 */
namespace App\Tests\Application\HandleOperations\GetPaidOrders;

use App\Aplication\HandleOperations\Dropshipping\GetPaidOrders\GetPaidOrders;
use App\Aplication\HandleOperations\Dropshipping\GetPaidOrders\GetPaidOrdersTransform;
use App\Entity\DropshippingPedidos;
use App\Entity\NotFindDropshippingOrderException;
use App\Repository\DropshippingPedidosRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GetPaidOrdersTest extends TestCase
{
    /**
     * @var MockObject
     */
    private $dropshippingRepository;
    private $dataTransform;
    private $ordersPaid;
    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->dropshippingRepository = $this
            ->getMockBuilder(DropshippingPedidosRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->dataTransform = new GetPaidOrdersTransform();
        $this->ordersPaid = [
            new DropshippingPedidos(
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
            ), new DropshippingPedidos(
                2,
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
            )];
    }

    /**
     * @test
     */
    public function given_GetPaidOrders_when_dont_exist_paid_orders_then_exception()
    {
        $this->expectException(NotFindDropshippingOrderException::class);
        (new GetPaidOrders($this->dropshippingRepository,$this->dataTransform))->execute();
    }

    public function given_GetPaidOrder_when_execute_then_return_orders_collection()
    {
        $this->dropshippingRepository->method('getPaidOrders')->willReturn($this->ordersPaid);

        $orders = (new GetPaidOrders($this->dropshippingRepository, $this->dataTransform))->execute();

        $this->assertEquals(2,$this->count($orders));
    }
}