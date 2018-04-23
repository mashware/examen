<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:33
 */

namespace App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido;


use Assert\Assertion;

class GetOrderCommand
{
    private $idPedido;

    /**
     * GetOrderCommand constructor.
     * @param $idPedido
     */
    public function __construct($idPedido)
    {
        Assertion::numeric($idPedido, 'Must be integer');
        $this->idPedido = $idPedido;
    }

    /**
     * @return int
     */
    public function getIdPedido(): int
    {
        return $this->idPedido;
    }

}