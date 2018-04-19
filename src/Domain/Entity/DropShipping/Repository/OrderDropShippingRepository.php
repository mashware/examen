<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:28
 */

namespace App\Domain\Entity\DropShipping\Repository;


interface OrderDropShippingRepository
{
    const PAID = 'PAGADO';
    public function allPaid(): array;
}

