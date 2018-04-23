<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 15:04
 */

namespace Application\DropShipping\DropShippingPaginateEx1\Interfaces;

interface DataTransformerPaginateEx1Interface
{
    public function execute(array $dataInput, $page): array;
}