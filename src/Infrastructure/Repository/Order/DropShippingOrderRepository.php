<?php

namespace Javier\Exam\Infrastructure\Repository\Order;

use Doctrine\ORM\EntityRepository;
use Javier\Exam\Domain\Model\Order\DropShippingOrderInterface;
use Javier\Exam\Domain\Model\Order\StatusDropShippingOrder;

class DropShippingOrderRepository extends EntityRepository implements DropShippingOrderInterface
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

    /*public function resetOrdersByIdAndArticle(int $id, int $article): bool
    {
        $order = $this->find(['pedido' => $id, 'id_articulo' => $article]);

        $this->find

        if (null === $order) {
            throw new \Exception('Pedido no encontrado');
        }

        $order->set
    }*/
}
