<?php

namespace Javier\Exam\Tests\Application\Order\StatusPaidOut;

use Javier\Exam\Application\Order\StatusPaidOut\StatusPaidOut;
use Javier\Exam\Application\Order\StatusPaidOut\StatusPaidOutTransform;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;
use Javier\Exam\Domain\Model\Order\OrdersNotFoundException;
use Javier\Exam\Domain\Model\Order\StatusDropShippingOrder;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Javier\Exam\Infrastructure\Repository\Order\DropShippingOrderRepository;
use PHPUnit\Framework\TestCase;

class StatusPaidOutTest extends TestCase
{
    /**
     * @test
     */
    public function given_orders_when_status_is_paid_out_then_exception_not_found(): void
    {
        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('showOrdersWithStatusPaidOut')
            ->willReturn([]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $statusPaidOutTransform = new StatusPaidOutTransform();
        $statusPaidOut = new StatusPaidOut($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $statusPaidOutTransform);

        $this->expectException(OrdersNotFoundException::class);
        $statusPaidOut->execute();
    }

    /**
     * @test
     */
    public function given_orders_when_status_is_paid_out_then_show(): void
    {
        $entity = new DropShippingOrder();
        $entity->setPedido(1);
        $entity->setEstado(StatusDropShippingOrder::STATUS_PAID_OUT);
        $entity->setIdArticulo(1);

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('showOrdersWithStatusPaidOut')
            ->willReturn([$entity]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $statusPaidOutTransform = new StatusPaidOutTransform();
        $statusPaidOut = new StatusPaidOut($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $statusPaidOutTransform);

        $this->assertArraySubset(
            [0 => [
                'pedido' => 1,
                'estado' => StatusDropShippingOrder::STATUS_PAID_OUT]
            ],
            $statusPaidOut->execute()
        );
    }
}
