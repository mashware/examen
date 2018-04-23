<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 21/04/2018
 * Time: 22:17
 */

namespace App\Domain\Model\Entity;


class DropShippingOrderStatus
{
    const STATUS_PAID = 'paid';
    const STATUS_NEW = 'nuevo';
    const STATUS_RED ='rojo';
    const STATUS_BUYED = 'comprado';
    const STATUS_GREEN = 'verde';
    const STATUS_ALBARANADO = 'albaranado';
    const STATUS_SYNC = 'sincronizado';
    const STATUS_FINISHED = 'finalizado';
    const STATUS_ERROR ='error';
}