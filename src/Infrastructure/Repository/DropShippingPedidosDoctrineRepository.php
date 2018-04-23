<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Entity\DropShippingOrderStatus;
use App\Domain\Model\Entity\DropShippingPedidos;
use App\Domain\Model\Entity\Interfaces\DropShippingPedidosRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DropShippingPedidos|null find($id, $lockMode = null, $lockVersion = null)
 * @method DropShippingPedidos|null findOneBy(array $criteria, array $orderBy = null)
 * @method DropShippingPedidos[]    findAll()
 * @method DropShippingPedidos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DropShippingPedidosDoctrineRepository extends ServiceEntityRepository implements DropShippingPedidosRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DropShippingPedidos::class);
    }

//    /**
//     * @return DropShippingPedidos[] Returns an array of DropShippingPedidos objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DropShippingPedidos
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByOrderNumber(int $orderNumber): array
    {
        return $this->createQueryBuilder('dso')
            ->andWhere('dso.pedido = :value')
            ->setParameter('value', $orderNumber)
            ->getQuery()
            ->execute();
    }

    public function findAllPaidStatusByPage(int $page): array
    {
        $query = $this->createQueryBuilder('dso')
            ->andWhere('dso.estado = :status')
            ->setParameter('status', DropShippingOrderStatus::STATUS_PAID)
            ->getQuery()
            ->setFirstResult(10 * ($page - 1)) // set the offset
            ->setMaxResults(10);;
        return $query->execute();
    }

    public function findByOrderNumberAndArticle(int $orderNumber, int $article): array
    {
        $query = $this->createQueryBuilder('dso')
            ->andWhere('dso.pedido = :orderNumber')
            ->andWhere('dso.id_articulo = :article')
            ->setParameter('orderNumber', $orderNumber)
            ->setParameter('article', $article)
            ->getQuery();
        return $query->execute();
    }
    public function persistAndFlush(DropShippingPedidos $order)
    {
        $this->getEntityManager()->persist($order);
        $this->getEntityManager()->flush();
    }
}
