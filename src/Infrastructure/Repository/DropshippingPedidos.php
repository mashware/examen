<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 15:09
 */

namespace App\Infrastructure\Repository;

use App\Domain\Model\Entity\DropshippingPedidos as Order;

interface DropshippingPedidos
{
    public function findOneOrder($order);
    public function findOneByIdArticleAndIdOrder($order, $article);
    public function listAllOrdersPaid();
    public function persistAndFlush(Order $order);
}
