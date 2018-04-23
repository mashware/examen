<?php

namespace App\Repository;

use App\Entity\ApiGamaBlancaProveedor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ApiGamaBlancaProveedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiGamaBlancaProveedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiGamaBlancaProveedor[]    findAll()
 * @method ApiGamaBlancaProveedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiGamaBlancaProveedorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ApiGamaBlancaProveedor::class);
    }

//    /**
//     * @return ApiGamaBlancaProveedor[] Returns an array of ApiGamaBlancaProveedor objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ApiGamaBlancaProveedor
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
