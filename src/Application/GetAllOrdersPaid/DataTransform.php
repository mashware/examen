<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:27
 */

namespace App\Application\GetAllOrdersPaid;


interface DataTransform
{
    public function transform($orders);
}