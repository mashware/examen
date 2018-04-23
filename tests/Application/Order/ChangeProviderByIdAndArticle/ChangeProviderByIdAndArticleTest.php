<?php

namespace Javier\Exam\Tests\Application\Order\ChangeProviderByIdAndArticle;

use Javier\Exam\Application\Order\ChangeProviderByIdAndArticle\ChangeProviderByIdAndArticle;
use Javier\Exam\Application\Order\ChangeProviderByIdAndArticle\ChangeProviderByIdAndArticleCommand;
use Javier\Exam\Application\Order\ChangeProviderByIdAndArticle\ChangeProviderByIdAndArticleTransform;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;
use Javier\Exam\Domain\Model\Order\OrdersNotFoundException;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Javier\Exam\Infrastructure\Repository\Order\DropShippingOrderRepository;
use PHPUnit\Framework\TestCase;

class ChangeProviderByIdAndArticleTest extends TestCase
{
    /**
     * @test
     */
    public function given_order_when_id_order_or_id_article_is_not_exists_then_exception_not_found(): void
    {
        $order = 1;
        $article = 1;
        $provider = 1;

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('changeProviderOrdersByIdAndArticle')
            ->withConsecutive([$order, $article, $provider])
            ->willReturn([]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $changeProviderByIdAndArticleTransform = new ChangeProviderByIdAndArticleTransform();
        $changeProviderByIdAndArticle = new ChangeProviderByIdAndArticle($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $changeProviderByIdAndArticleTransform);

        $this->expectException(OrdersNotFoundException::class);

        $resetByIdAndArticleCommand = new ChangeProviderByIdAndArticleCommand($order, $article, $provider);
        $changeProviderByIdAndArticle->execute($resetByIdAndArticleCommand);
    }

    /**
     * @test
     */
    public function given_order_when_id_order_and_id_article_is_exists_then_change_provider_and_show(): void
    {
        $order = 1;
        $article = 1;
        $provider = 1;
        $entity = new DropShippingOrder();
        $entity->setPedido(1);
        $entity->setIdArticulo(1);

        $repositoryDropShippingOrder = $this->getMockBuilder(DropShippingOrderRepository::class)
            ->disableOriginalConstructor()->getMock();
        $repositoryDropShippingOrder->method('changeProviderOrdersByIdAndArticle')
            ->withConsecutive([$order, $article, $provider])
            ->willReturn([$entity]);

        $checkListOrdersIsNotFound = new CheckListOrdersIsNotFound();
        $changeProviderByIdAndArticleTransform = new ChangeProviderByIdAndArticleTransform();
        $changeProviderByIdAndArticle = new ChangeProviderByIdAndArticle($repositoryDropShippingOrder,
            $checkListOrdersIsNotFound,
            $changeProviderByIdAndArticleTransform);

        $resetByIdAndArticleCommand = new ChangeProviderByIdAndArticleCommand($order, $article, $provider);
        ;

        $this->assertArraySubset(
            [0 =>
                [
                    'pedido' => 1,
                    'id_articulo' => 1
                ]
            ],
            $changeProviderByIdAndArticle->execute($resetByIdAndArticleCommand)
        );
    }
}
