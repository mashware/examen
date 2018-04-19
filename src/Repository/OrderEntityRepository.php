<?php

namespace App\Repository;

use App\Domain\Entity\OrderEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Domain\Entity\OrderEntityRepositoryInterface;


/**
 * @method OrderEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderEntity[]    findAll()
 * @method OrderEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderEntityRepository extends ServiceEntityRepository implements OrderEntityRepositoryInterface
{

    const PAGADO = 'pagado';
    const NOPAGADO = 'no pagado';

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrderEntity::class);
    }

//    /**
//     * @return OrderEntity[] Returns an array of OrderEntity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderEntity
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function createOrder(OrderEntity $orderEntity): void
    {
        $this->getEntityManager()->persist($orderEntity);
        $this->getEntityManager()->flush();
        //return $cursoEntity->getId();
    }

    public function returnPaidOrders(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.pedido', 'p.estado', 'p.fecha_sincronizado')
            ->andWhere('p.estado = :paid')
            ->setParameter('paid', self::PAGADO)
            ->getQuery();

        return $qb->execute();
    }

    public function reset(string $pedido, string $id_articulo): void
    {
        // TODO: Implement reset() method.
    }

    public function returnOrder(string $pedido): array
    {
        // TODO: Implement returnOrder() method.
    }

    public function changeProvider(string $pedido, string $id_articulo, string $proveedor): void
    {
        // TODO: Implement changeProvider() method.
    }

    public function paginateEx1()
    {
        // TODO: Implement paginateEx1() method.
    }
}
