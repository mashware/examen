<?php

namespace Javier\Exam\Tests\Application\Order\StatusPaidOutPaginate;

use Javier\Exam\Application\Order\StatusPaidOutPaginate\StatusPaidOutPaginate;
use Javier\Exam\Application\Order\StatusPaidOutPaginate\StatusPaidOutPaginateCommand;
use Javier\Exam\Application\Order\StatusPaidOutPaginate\StatusPaidOutPaginateTransform;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;
use Javier\Exam\Domain\Model\Order\OrdersNotFoundException;
use Javier\Exam\Domain\Model\Order\StatusDropShippingOrder;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Javier\Exam\Infrastructure\Repository\Order\DropShippingOrderRepository;
use PHPUnit\Framework\TestCase;

class StatusPaidOutPaginateTest extends TestCase
{
    /**
     * @test
     */
    public function given_orders_when_status_is_paid_out_and_specific_number_page_then_exception_not_found(): void
    {
        $page = 1;

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('showOrdersWithStatusPaidOutPaginate')
            ->with($page)
            ->willReturn([]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $statusPaidOutTransform = new StatusPaidOutPaginateTransform();
        $statusPaidOut = new StatusPaidOutPaginate($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $statusPaidOutTransform);

        $this->expectException(OrdersNotFoundException::class);

        $statusPaidOutPaginateCommand = new StatusPaidOutPaginateCommand($page);
        $statusPaidOut->execute($statusPaidOutPaginateCommand);
    }

    /**
     * @test
     */
    public function given_orders_when_status_is_paid_out_and_specific_number_page_then_show(): void
    {
        $page = 1;
        $entity = new DropShippingOrder();
        $entity->setPedido(1);
        $entity->setEstado(StatusDropShippingOrder::STATUS_PAID_OUT);
        $entity->setIdArticulo(1);

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('showOrdersWithStatusPaidOutPaginate')
            ->with($page)
            ->willReturn([$entity]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $statusPaidOutTransform = new StatusPaidOutPaginateTransform();
        $statusPaidOut = new StatusPaidOutPaginate($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $statusPaidOutTransform);

        $statusPaidOutPaginateCommand = new StatusPaidOutPaginateCommand($page);

        $this->assertArraySubset(
            [0 =>
                [
                    'pedido' => 1,
                    'estado' => StatusDropShippingOrder::STATUS_PAID_OUT
                ]
            ],
            $statusPaidOut->execute($statusPaidOutPaginateCommand));
    }
}
