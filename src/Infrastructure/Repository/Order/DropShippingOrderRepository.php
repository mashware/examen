<?php

namespace Javier\Exam\Infrastructure\Repository\Order;

use Doctrine\ORM\EntityRepository;
use Javier\Exam\Domain\Model\Order\DropShippingOrderRepositoryInterface;
use Javier\Exam\Domain\Model\Order\StatusDropShippingOrder;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder;

class DropShippingOrderRepository extends EntityRepository implements DropShippingOrderRepositoryInterface
{
    public function showOrdersWithStatusPaidOut(): array
    {
        $query = $this->createQueryBuilder('dso')
            ->andWhere('dso.estado = :status')
            ->setParameter('status', StatusDropShippingOrder::STATUS_PAID_OUT)
            ->getQuery();

        return $query->execute();
    }

    public function showOrderById(int $id): array
    {
        $query = $this->createQueryBuilder('dso')
            ->andWhere('dso.pedido = :order')
            ->setParameter('order', $id)
            ->getQuery();

        return $query->execute();
    }

    /**
     * @param int $id
     * @param int $article
     * @return array
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function resetOrdersByIdAndArticle(int $id, int $article): array
    {
        $orders = $this->queryByIdAndArticle($id, $article);

        /* @var $order DropShippingOrder */
        foreach ($orders as $order) {
            $order->setEstado(StatusDropShippingOrder::STATUS_NEW);
            $order->setPedidoProveedor(0);
            $order->setAlmacen(0);
            $order->setIdProveedor(0);
        }

        $this->getEntityManager()->flush();

        return $orders;
    }

    /**
     * @param int $id
     * @param int $article
     * @return array
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function changeProviderOrdersByIdAndArticle(int $id, int $article, int $repository): array
    {
        $orders = $this->queryByIdAndArticle($id, $article);

        /* @var $order DropShippingOrder */
        foreach ($orders as $order) {
            $order->setIdProveedor($repository);
        }

        $this->getEntityManager()->flush();

        return $orders;
    }

    private function queryByIdAndArticle(int $id, int $article): array
    {
        $query = $this->createQueryBuilder('dso')
            ->andWhere('dso.pedido = :order AND dso.idArticulo = :article')
            ->setParameter('order', $id)
            ->setParameter('article',$article)
            ->getQuery();

        return $query->execute();
    }
}
