<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:25
 */

namespace App\Test\Domain\Entity\DropShipping;

use App\Domain\Entity\DropShipping\Provider;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    /**
     * @test
     */
    public function test_if_can_create_provider()
    {
        new Provider('dfg');
        $this->assertTrue(true);
    }

}