<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:27
 */

namespace App\Application\GetAllOrdersPaid;


interface GetAllOrdersPaidDataTransform
{
    public function transform($orders);
}