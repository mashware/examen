<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 12:54
 */

namespace App\Application\DropShipping\ListByOrderNumberAndArticle;


use App\Application\DropShipping\Util\DataTransform\DataTransformInterface;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;

class ListByOrderNumberAndArticle
{
    private $dataTransformToArray;
    private $dropShippingRepository;

    public function __construct(
        DataTransformInterface $dataTransformToArray,
        DropShippingPedidosRepositoryInterface $dropShippingDoctrineRepository
    ) {
        $this->dataTransformToArray = $dataTransformToArray;
        $this->dropShippingRepository = $dropShippingDoctrineRepository;
    }

    public function handle(ListByOrderNumberAndArticleCommand $listByOrderNumberAndArticleCommand): array
    {
        $dropShippingOrders = $this->dropShippingRepository
            ->findByOrderNumberAndArticle(
                $listByOrderNumberAndArticleCommand->getOrderNumber(),
                $listByOrderNumberAndArticleCommand->getArticle()
            );
        $dropShippingOrders = $this->dataTransformToArray
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}
