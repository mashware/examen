<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 22/04/18
 * Time: 13:03
 */

namespace App\Domain\Service\Interfaces;


interface Validable
{
    public function validate($object);
}