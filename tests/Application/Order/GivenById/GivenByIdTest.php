<?php

namespace Javier\Exam\Tests\Application\Order\GivenById;

use Javier\Exam\Application\Order\GivenById\GivenById;
use Javier\Exam\Application\Order\GivenById\GivenByIdCommand;
use Javier\Exam\Application\Order\GivenById\GivenByIdTransform;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;
use Javier\Exam\Domain\Model\Order\OrdersNotFoundException;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Javier\Exam\Infrastructure\Repository\Order\DropShippingOrderRepository;
use PHPUnit\Framework\TestCase;

class GivenByIdTest extends TestCase
{
    /**
     * @test
     */
    public function given_order_when_id_order_not_exists_then_exception_order_not_found()
    {
        $id = 1;

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('showOrderById')
            ->with($id)
            ->willReturn([]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $givenByIdTransform = new GivenByIdTransform();
        $givenById = new GivenById($repositoryDropShippingOrder, $checkListOrdersIsNotFound, $givenByIdTransform);

        $this->expectException(OrdersNotFoundException::class);

        $givenByIdCommand = new GivenByIdCommand($id);
        $givenById->execute($givenByIdCommand);
    }

    /**
     * @test
     */
    public function given_order_when_id_order_is_exists_then_show_order()
    {
        $id = 1;
        $entity = new DropShippingOrder();
        $entity->setPedido(1);
        $entity->setIdArticulo(1);

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('showOrderById')
            ->with($id)
            ->willReturn([$entity]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $givenByIdTransform = new GivenByIdTransform();
        $givenById = new GivenById($repositoryDropShippingOrder, $checkListOrdersIsNotFound, $givenByIdTransform);

        $givenByIdCommand = new GivenByIdCommand($id);

        $this->assertArraySubset([0 => ['pedido' => 1]], $givenById->execute($givenByIdCommand));
    }
}
