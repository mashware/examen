<?php

namespace App\Tests;

use App\Domain\prueba;
use Infrastructure\Repository\OrderEntityRepository;
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
        $prueba = new prueba('Hola mundo');
        $this->assertTrue($prueba->printCadena());
    }
}