<?php

namespace App\Application\Order\ResetWithOrderAndArticle;

use App\Infrastructure\Repository\DropshippingPedidos;

class ResetWithOrderAndArticle
{
    private $orderRepository;
    private $dataTransform;

    public function __construct(
        DropshippingPedidos $orderRepository,
        ResetWithOrderAndArticleDataTransform $dataTransform
    ) {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @param ResetWithOrderAndArticleCommand $command
     * @return string
     * @throws ResetWithOrderAndArticleException
     */
    public function handle(ResetWithOrderAndArticleCommand $command): string
    {
        /**
         * @var $order \App\Entity\DropshippingPedidos
         */
        $order = $this->orderRepository
            ->findOneByIdArticleAndIdOrder(
                $command->order(),
                $command->article()
            );
        if (null === $order) {
            throw new ResetWithOrderAndArticleException('KO');
        }

        $order->setEstado('NUEVO');
        $order->setPedidoProveedor(0);
        $order->setAlmacen(0);
        $order->setIdProveedor(0);

        $this->orderRepository->persistAndFlush($order);

        return $this->dataTransform->transform();
    }
}
