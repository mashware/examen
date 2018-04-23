<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 23/04/18
 * Time: 17:32
 */

namespace Application\DropShipping;


class Prueba2
{
    private $var;
    public function __construct($var)
    {
        $this->var = $var;
    }

    public function printVar()
    {
        echo $this->var;
        return true;
    }
}