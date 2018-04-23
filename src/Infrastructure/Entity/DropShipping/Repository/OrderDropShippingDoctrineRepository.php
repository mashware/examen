<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:01
 */

namespace App\Infrastructure\Entity\DropShipping\Repository;

use App\Domain\Entity\DropShipping\OrderNotFoundException;
use App\Domain\Entity\DropShipping\Repository\OrderDropShippingRepository;
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
     * @throws OrderNotFoundException
     */
    public function getOrdersDropShippingWithOrderIdOrFail(int $orderId, int $articleId)
    {
        $orders = $this->findBy(['orderId' => $orderId, 'articleId' => $articleId]);

        if (empty($orders)){
            throw new OrderNotFoundException();
        }

        return $orders;
    }

    /**
     * @param int $orderId
     * @return array
     * @throws OrderNotFoundException
     */
    public function getAnOrderWithOrderIdOrFail(int $orderId)
    {
        $order = $this->findBy(['orderId' => $orderId]);

        if (empty($order)){
            throw new OrderNotFoundException();
        }

        return $order;
    }
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }

    public function allOrdersPaidPage($page, $ordersPerPage)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('articles')
            ->from('App:DropShipping\OrderDropShipping', 'articles')
            ->where('articles.stateOrder = :stateOrder')
            ->setMaxResults($ordersPerPage)
            ->setFirstResult($page)
            ->setParameter('stateOrder', OrderDropShippingRepository::PAID)
            ->getQuery()
            ->execute();
    }


}