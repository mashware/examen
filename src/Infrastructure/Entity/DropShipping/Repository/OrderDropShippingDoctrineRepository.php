<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:01
 */

namespace App\Infrastructure\Entity\DropShipping\Repository;

use App\Domain\Entity\DropShipping\Repository\OrderDropShippingRepository;
use Doctrine\ORM\EntityRepository;

class OrderDropShippingDoctrineRepository extends EntityRepository implements \App\Domain\Entity\DropShipping\Repository\OrderDropShippingRepository
{
    public function allPaid(): array
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('order')
            ->from('App:DropShipping\OrderDropShipping', 'order')
            ->where('order.stateOrder = :paid')
            ->setParameter('paid', OrderDropShippingRepository::PAID)
            ->getQuery()
            ->execute();
    }
}