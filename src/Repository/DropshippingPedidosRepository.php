<?php

namespace App\Repository;

use App\Domain\Model\Entity\DropshippingPedidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Infrastructure\Repository\DropshippingPedidos as interfaceDropShippingPedidos;

/**
 * Class DropshippingPedidosRepository
 * @package App\Repository
 */
class DropshippingPedidosRepository extends ServiceEntityRepository implements interfaceDropShippingPedidos
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DropshippingPedidos::class);
    }

    /**
     * @param $order
     * @return null|object
     */
    public function findOneOrder($order)
    {
        return $this->findOneBy(
            [
                'pedido' => $order,
            ]
        );
    }

    /**
     * @param $order
     * @param $article
     * @return null|object
     */
    public function findOneByIdArticleAndIdOrder($order, $article)
    {
        return $this->findOneBy(
            [
                'pedido' => $order,
                'idArticulo' => $article
            ]
        );
    }

    /**
     * @return array
     */

    public function listAllOrdersPaid()
    {
        return $this->findBy(['estado' => 'PAGADO']);
    }

    /**
     * @param DropshippingPedidos $order
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persistAndFlush(DropshippingPedidos $order)
    {
        $this->getEntityManager()->persist($order);
        $this->getEntityManager()->flush();
    }
}
