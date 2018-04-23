<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:47
 */

namespace App\Aplication\HandleOperations\Dropshipping\ResetOrders;


use App\Entity\AlreadyResetOrder;
use App\Entity\DropshippingPedidos;
use App\Entity\NotFindDropshippingOrderException;
use App\Infraestructure\Repository\DropshippingPedidos as IDropshippingPedidos;

class ResetOrderByIdPedidoAndIdArticle
{
    private $repository;
    private const NUEVO = 'NUEVO';

    /**
     * ResetOrderByIdPedidoAndIdArticle constructor.
     * @param $repository
     */
    public function __construct(IDropshippingPedidos $repository)
    {
        $this->repository = $repository;
    }


    public function handle(ResetOrderCommand $resetOrderCommand): void
    {
        /**
         * @var $order DropshippingPedidos
         */
        $order = $this->repository->findByIdPedidoAndIdArticulo($resetOrderCommand->getIdPedido(), $resetOrderCommand->getIdArticulo());

        if(null === $order){
            throw new NotFindDropshippingOrderException('KO');
        }
        if (self::NUEVO===$order->getEstado())
        {
            throw new AlreadyResetOrder('KO');
        }
        $order->setEstado(self::NUEVO);
        $order->setPedidoProveedor(0);
        $order->setAlmacen(0);
        $order->setIdProveedor(0);

        $this->repository->persistAndFlush($order);
    }
}