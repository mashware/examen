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
    const STATUS_PAID = 'PAGADO';
    const STATUS_NEW = 'NUEVO';
    const RED ='ROJO';
    const BUYED = 'COMPRADO';
    const GREEN = 'VERDE';
    const ALBARANADO = 'ALBARANADO';
    const SYNC = 'SINCRONIZADO';
    const FINISHED = 'FINALIZADO';
    const ERROR ='ERROR';
}