<?php

namespace App\Tests;

use Infrastructure\Repository\OrderEntityRepository;


/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:56
 */

class DropShippingTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function given_an_instance_when_is_created_then_success()
    {
        new OrderEntityRepository();
        $this->assertTrue(true);
    }
}