<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:01
 */

namespace App\Infrastructure\Entity\DropShipping\Repository;

use App\Domain\Entity\DropShipping\OrderDropShipping;
use App\Domain\Entity\DropShipping\Repository\OrderDropShippingRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

class OrderDropShippingDoctrineRepository extends EntityRepository implements OrderDropShippingRepository
{
    public function allPaid()
    {
        return $this->findBy(['stateOrder' => OrderDropShippingRepository::PAID]);
    }

    /**
     * @param int $orderId
     * @param int $articleId
     * @return array
     * @throws EntityNotFoundException
     */
    public function getOrdersDropShippingWithOrderIdOrFail(int $orderId, int $articleId)
    {
        $orders = $this->findBy(['orderId' => $orderId, 'articleId' => $articleId]);

        if (empty($orders)){
            throw new EntityNotFoundException();
        }

        return $orders;
    }

    /**
     * @param OrderDropShipping $orderDropShipping
     * @return OrderDropShipping
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }


}