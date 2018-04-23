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
use App\Domain\Service\CheckIfOrdersExist;

class ListByOrderNumberAndArticle
{
    private $dataTransformToArray;
    private $dropShippingRepository;
    private $checkIfOrdersExist;

    public function __construct(
        DataTransformInterface $dataTransformToArray,
        DropShippingPedidosRepositoryInterface $dropShippingDoctrineRepository,
        CheckIfOrdersExist $checkIfOrdersExist
    ) {
        $this->dataTransformToArray = $dataTransformToArray;
        $this->dropShippingRepository = $dropShippingDoctrineRepository;
        $this->checkIfOrdersExist = $checkIfOrdersExist;
    }

    public function handle(ListByOrderNumberAndArticleCommand $listByOrderNumberAndArticleCommand): array
    {
        $dropShippingOrders = $this->dropShippingRepository
            ->findByOrderNumberAndArticle(
                $listByOrderNumberAndArticleCommand->getOrderNumber(),
                $listByOrderNumberAndArticleCommand->getArticle()
            );
        $dropShippingOrders = $this->checkIfOrdersExist->execute($dropShippingOrders);
        $dropShippingOrders = $this->dataTransformToArray
            ->execute($dropShippingOrders);

        return $dropShippingOrders;
    }
}
