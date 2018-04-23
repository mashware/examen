<?php

namespace App\Tests;

use Application\prueba;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:56
 */

class DropShippingTest extends TestCase
{
    /**
     * @test
     */
    public function given_an_instance_when_is_created_then_success()
    {

        $this->assertTrue((new Prueba())->printCadena('Hola'));
    }
}