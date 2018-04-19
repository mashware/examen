<?php

namespace App\Repository;

use App\Domain\Entity\ApiGamaBlancaProveedorEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ApiGamaBlancaProveedorEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiGamaBlancaProveedorEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiGamaBlancaProveedorEntity[]    findAll()
 * @method ApiGamaBlancaProveedorEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiGamaBlancaProveedorEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ApiGamaBlancaProveedorEntity::class);
    }

//    /**
//     * @return ApiGamaBlancaProveedorEntity[] Returns an array of ApiGamaBlancaProveedorEntity objects
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
    public function findOneBySomeField($value): ?ApiGamaBlancaProveedorEntity
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
