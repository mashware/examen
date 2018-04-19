<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:14
 */
namespace App\Domain\Service;

class EmptyValidator
{
    public function execute(array $result): bool
    {
        return empty($result);
    }
}