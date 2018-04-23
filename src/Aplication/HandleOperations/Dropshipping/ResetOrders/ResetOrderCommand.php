<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 9:20
 */

namespace App\Aplication\HandleOperations\Dropshipping\ResetOrders;


use Assert\Assertion;

class ResetOrderCommand
{
    private $idPedido;
    private $idArticulo;

    /**
     * ResetOrderCommand constructor.
     * @param $idPedido
     * @param $idArticulo
     */
    public function __construct($idPedido, $idArticulo)
    {
        Assertion::integer($idPedido,'Must be a integer');
        Assertion::integer($idArticulo,'Must be a integer');

        $this->idPedido = $idPedido;
        $this->idArticulo = $idArticulo;
    }

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * @return mixed
     */
    public function getIdArticulo()
    {
        return $this->idArticulo;
    }

}