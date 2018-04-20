<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:19
 */

namespace App\Application\Order\ListOneOrder;

use App\Infrastructure\Repository\DropshippingPedidos;

class ListOneOrder
{
    private $orderRepository;
    private $dataTransform;

    /**
     * ListOneOrder constructor.
     * @param DropshippingPedidos $orderRepository
     * @param ListOneOrderDataTransform $dataTransform
     */
    public function __construct(
        DropshippingPedidos $orderRepository,
        ListOneOrderDataTransform $dataTransform
    ) {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @param ListOneOrderCommand $command
     * @return mixed
     * @throws ListOneOrderException
     */
    public function handle(ListOneOrderCommand $command)
    {
        $order = $this->orderRepository->findOneOrder($command->order());
        if (null === $order) {
            throw new ListOneOrderException('No se encuentra ese pedido');
        }
        return $this->dataTransform->transform($order);
    }
}
