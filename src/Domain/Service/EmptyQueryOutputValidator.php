<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:14
 */
namespace App\Domain\Service;

use App\Domain\Service\Interfaces\Validable;

class EmptyQueryOutputValidator implements Validable
{
    public function validate($result): bool
    {
        return empty($result);
    }
}