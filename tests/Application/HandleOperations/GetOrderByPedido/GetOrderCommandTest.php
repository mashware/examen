<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:03
 */

namespace App\Tests\Application\HandleOperations\GetOrderByPedido;


use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderCommand;
use PHPUnit\Framework\TestCase;

class GetOrderCommandTest extends TestCase
{
    /**
     * @test
     */
    public function given_GetOrderCommand_when_get_non_integer_then_exception()
    {
        $this->expectException(\Exception::class);
        new GetOrderCommand('foo');
    }

    /**
     * @test
     */
    public function given_GetOrderCommand_when_get_integer_then_succes()
    {
        $idPedido = 2;
        $command=new GetOrderCommand($idPedido);
        $this->assertEquals($idPedido, $command->getIdPedido());
    }
}