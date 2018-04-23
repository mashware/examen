<?php

namespace App\Tests;

use App\Domain\Entity\EmptyQueryOutputException;
use Application\DropShipping\DropShippingReturnPaidOrders\DataTransformerReturnPaidOrders;
use Application\DropShipping\DropShippingReturnPaidOrders\DropShippingReturnPaidOrders;
use Infrastructure\Repository\OrderEntityRepository;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:56
 */

class DropShippingReturnPaidOrdersTest extends TestCase
{
    /**
     * @test
     */
    public function given_return_paid_orders_when_database_is_empty_then_throw_EmptyQueryOutputException(): void
    {
        $dataOutput = [];

        $repositoryDropShippingReturnPaidOrders = $this->getMockBuilder(OrderEntityRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingReturnPaidOrders->method('returnPaidOrders')
            ->willReturn($dataOutput);

        $dataTransformerReturnPaidOrders = new DataTransformerReturnPaidOrders();
        $dropShippingReturnPaidOrders = new DropShippingReturnPaidOrders(
            $repositoryDropShippingReturnPaidOrders,
            $dataTransformerReturnPaidOrders
        );
        $this->expectException(EmptyQueryOutputException::class);
        $dropShippingReturnPaidOrders->execute();
    }

    /**
     * @test
     */
    public function given_any_order_when_paid_then_show_order(): void
    {
        $dataOutput[] = ["pedido"=>"44","estado"=>"pagado","fecha_sincronizado"=>"14"];

        $repositoryDropShippingReturnPaidOrders = $this->getMockBuilder(OrderEntityRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingReturnPaidOrders->method('returnPaidOrders')
            ->willReturn($dataOutput);

        $dataTransformerReturnPaidOrders = new DataTransformerReturnPaidOrders();
        $dropShippingReturnPaidOrders = new DropShippingReturnPaidOrders(
            $repositoryDropShippingReturnPaidOrders,
            $dataTransformerReturnPaidOrders
        );

        $this->assertArraySubset(
            [
                0 =>
                    [
                        0 =>"44",
                        1 =>
                            [
                                "pedido" => "44",
                                "estado" => "pagado",
                                "fecha_sincronizado" => "14"
                            ]
                    ]
            ],
            $dropShippingReturnPaidOrders->execute()
        );
    }
}