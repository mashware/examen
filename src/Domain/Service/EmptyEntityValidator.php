<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 22/04/18
 * Time: 13:07
 */

namespace App\Domain\Service;


use App\Domain\Service\Interfaces\Validable;

class EmptyEntityValidator implements Validable
{
    public function validate($object)
    {
        return is_null($object);
    }

}