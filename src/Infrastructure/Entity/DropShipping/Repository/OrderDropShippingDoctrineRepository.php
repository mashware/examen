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
use Doctrine\ORM\EntityRepository;

class OrderDropShippingDoctrineRepository extends EntityRepository implements OrderDropShippingRepository
{
    public function allPaid()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('orderDropShipping')
            ->from('App:DropShipping\OrderDropShipping', 'orderDropShipping')
            ->where('orderDropShipping.stateOrder = :paid')
            ->setParameter('paid', OrderDropShippingRepository::PAID)
            ->getQuery()
            ->execute();
    }

    private function getOneOrderDropShipping(int $orderDropShippingId)
    {
        return $this->findOneBy(['id' => $orderDropShippingId]);
    }
}