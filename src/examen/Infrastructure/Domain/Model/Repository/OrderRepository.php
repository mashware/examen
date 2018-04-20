<?php

namespace App\examen\Infrastructure\Domain\Model\Repository;

use App\examen\Domain\Model\DropShiping\DropShipingRepository;
use Doctrine\ORM\EntityRepository;

/**
 * @method DropShiping|null find($id, $lockMode = null, $lockVersion = null)
 * @method DropShiping|null findOneBy(array $criteria, array $orderBy = null)
 * @method DropShiping[]    findAll()
 * @method DropShiping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends EntityRepository implements DropShipingRepository
{

    public function getAllOrders()
    {
        return $this->createQueryBuilder('p')
            ->select('p')
            ->from('App:DropShiping\DropShiping','s')
            ->getQuery()
            ->execute();
    }

}
