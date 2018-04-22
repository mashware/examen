<?php

namespace Infrastructure\Repository;

use App\Domain\Entity\OrderEntity;
use Doctrine\ORM\EntityRepository;
use App\Domain\Entity\OrderEntityRepositoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method OrderEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderEntity[]    findAll()
 * @method OrderEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderEntityRepository extends EntityRepository implements OrderEntityRepositoryInterface
{

    const PAGADO = 'pagado';
    const NOPAGADO = 'no pagado';

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

    public function persist(OrderEntity $orderEntity): void
    {
        $this->getEntityManager()->persist($orderEntity);
        $this->getEntityManager()->flush();
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


    public function returnOrder(string $pedido): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.pedido', 'p.estado', 'p.fecha_sincronizado')
            ->andWhere('p.pedido = :order')
            ->setParameter('order', $pedido)
            ->getQuery();
        return $qb->execute();
    }

    public function changeProvider(string $pedido, string $id_articulo, string $proveedor): void
    {

    }
    
}
