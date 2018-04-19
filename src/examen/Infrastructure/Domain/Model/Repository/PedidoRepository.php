<?php

namespace App\examen\Infrastructure\Domain\Model\Repository;

use App\examen\Domain\Model\DropShiping\Domain\DropShiping;
use App\examen\Domain\Model\DropShiping\Domain\DropShipingRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DropShiping|null find($id, $lockMode = null, $lockVersion = null)
 * @method DropShiping|null findOneBy(array $criteria, array $orderBy = null)
 * @method DropShiping[]    findAll()
 * @method DropShiping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoRepository extends ServiceEntityRepository implements DropShipingRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DropShiping::class);
    }

//    /**
//     * @return DropShiping[] Returns an array of DropShiping objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DropShiping
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
