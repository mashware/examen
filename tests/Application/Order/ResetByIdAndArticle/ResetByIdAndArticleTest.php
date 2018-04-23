<?php

namespace Javier\Exam\Tests\Application\Order\ResetByIdAndArticle;

use Javier\Exam\Application\Order\ResetByIdAndArticle\ResetByIdAndArticle;
use Javier\Exam\Application\Order\ResetByIdAndArticle\ResetByIdAndArticleCommand;
use Javier\Exam\Application\Order\ResetByIdAndArticle\ResetByIdAndArticleTransform;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;
use Javier\Exam\Domain\Model\Order\OrdersNotFoundException;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Javier\Exam\Infrastructure\Repository\Order\DropShippingOrderRepository;
use PHPUnit\Framework\TestCase;

class ResetByIdAndArticleTest extends TestCase
{
    /**
     * @test
     */
    public function given_order_when_id_order_or_id_article_is_not_exists_then_exception_not_found(): void
    {
        $order = 1;
        $article = 1;

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('resetOrdersByIdAndArticle')
            ->withConsecutive([$order, $article])
            ->willReturn([]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $resetByIdAndArticleTransform = new ResetByIdAndArticleTransform();
        $resetByIdAndArticle = new ResetByIdAndArticle($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $resetByIdAndArticleTransform);

        $this->expectException(OrdersNotFoundException::class);

        $resetByIdAndArticleCommand = new ResetByIdAndArticleCommand($order, $article);
        $resetByIdAndArticle->execute($resetByIdAndArticleCommand);
    }

    /**
     * @test
     */
    public function given_order_when_id_order_and_id_article_is_exists_then_reset_and_show(): void
    {
        $order = 1;
        $article = 1;
        $entity = new DropShippingOrder();
        $entity->setPedido(1);
        $entity->setIdArticulo(1);

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('resetOrdersByIdAndArticle')
            ->withConsecutive([$order, $article])
            ->willReturn([$entity]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $resetByIdAndArticleTransform = new ResetByIdAndArticleTransform();
        $resetByIdAndArticle = new ResetByIdAndArticle($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $resetByIdAndArticleTransform);

        $resetByIdAndArticleCommand = new ResetByIdAndArticleCommand($order, $article);

        $this->assertArraySubset(
            [0 =>
                [
                    'pedido' => 1,
                    'id_articulo' => 1
                ]
            ],
            $resetByIdAndArticle->execute($resetByIdAndArticleCommand)
        );
    }
}
