<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:27
 */

namespace App\Domain\Entity\DropShipping;


class OrderNotFoundException extends \Exception
{

    // Redefinir la excepción, por lo que el mensaje no es opcional
    public function __construct()
    {
        parent::__construct();
    }


}




