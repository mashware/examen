<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Entity\ApiGamaBlancaProveedor;
use App\Domain\Model\Entity\Interfaces\ApiGamaBlancaProveedorRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ApiGamaBlancaProveedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiGamaBlancaProveedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiGamaBlancaProveedor[]    findAll()
 * @method ApiGamaBlancaProveedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiGamaBlancaProveedorRepositoryDoctrineRepository extends ServiceEntityRepository implements ApiGamaBlancaProveedorRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ApiGamaBlancaProveedor::class);
    }

//    /**
//     * @return CreateApiGamaBlancaProveedor[] Returns an array of CreateApiGamaBlancaProveedor objects
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
    public function findOneBySomeField($value): ?CreateApiGamaBlancaProveedor
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
