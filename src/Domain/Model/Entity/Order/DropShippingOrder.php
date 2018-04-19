<?php

namespace Javier\Exam\Domain\Model\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Javier\Exam\Infrastructure\Repository\Order\DropShippingOrderRepository")
 * @ORM\Table(name="drop_shipping_order")
 */
class DropShippingOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\SequenceGenerator(sequenceName="id", initialValue=5702)
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $pedido;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default"=null})
     */
    private $idProveedor;

    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default"=null})
     */
    private $fechaSincronizado;

    /**
     * @ORM\Column(type="string", nullable=true, options={"default"=null})
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default"=null})
     */
    private $fechaEnvioPrevistaMin;

    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default"=null})
     */
    private $fechaEnvioPrevista;

    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default"=null})
     */
    private $fechaEntregaPrevistaMin;

    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default"=null})
     */
    private $fechaEntregaPrevista;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default"=null})
     */
    private $idArticulo;

    /**
     * @ORM\Column(type="bigint", nullable=true, options={"default"=0})
     */
    private $pedidoProveedor;

    /**
     * @ORM\Column(type="string", length=50, nullable=true, options={"default"=null})
     */
    private $agenciaEnviada;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default"=false})
     */
    private $emailPedidoEnviado;

    /**
     * @ORM\Column(type="string", length=50, nullable=true, options={"default"="0"})
     */
    private $etiqueta;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default"=0})
     */
    private $almacen;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getPedido()
    {
        return $this->pedido;
    }

    public function setPedido($pedido): void
    {
        $this->pedido = $pedido;
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    public function setIdProveedor($idProveedor): void
    {
        $this->idProveedor = $idProveedor;
    }

    public function getFechaSincronizado()
    {
        return $this->fechaSincronizado;
    }

    public function setFechaSincronizado($fechaSincronizado): void
    {
        $this->fechaSincronizado = $fechaSincronizado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function getFechaEnvioPrevistaMin()
    {
        return $this->fechaEnvioPrevistaMin;
    }

    public function setFechaEnvioPrevistaMin($fechaEnvioPrevistaMin): void
    {
        $this->fechaEnvioPrevistaMin = $fechaEnvioPrevistaMin;
    }

    public function getFechaEnvioPrevista()
    {
        return $this->fechaEnvioPrevista;
    }

    public function setFechaEnvioPrevista($fechaEnvioPrevista): void
    {
        $this->fechaEnvioPrevista = $fechaEnvioPrevista;
    }

    public function getFechaEntregaPrevistaMin()
    {
        return $this->fechaEntregaPrevistaMin;
    }

    public function setFechaEntregaPrevistaMin($fechaEntregaPrevistaMin): void
    {
        $this->fechaEntregaPrevistaMin = $fechaEntregaPrevistaMin;
    }

    public function getFechaEntregaPrevista()
    {
        return $this->fechaEntregaPrevista;
    }

    public function setFechaEntregaPrevista($fechaEntregaPrevista): void
    {
        $this->fechaEntregaPrevista = $fechaEntregaPrevista;
    }

    public function getIdArticulo()
    {
        return $this->idArticulo;
    }

    public function setIdArticulo($idArticulo): void
    {
        $this->idArticulo = $idArticulo;
    }

    public function getPedidoProveedor()
    {
        return $this->pedidoProveedor;
    }

    public function setPedidoProveedor($pedidoProveedor): void
    {
        $this->pedidoProveedor = $pedidoProveedor;
    }

    public function getAgenciaEnviada()
    {
        return $this->agenciaEnviada;
    }

    public function setAgenciaEnviada($agenciaEnviada): void
    {
        $this->agenciaEnviada = $agenciaEnviada;
    }

    public function getEmailPedidoEnviado()
    {
        return $this->emailPedidoEnviado;
    }

    public function setEmailPedidoEnviado($emailPedidoEnviado): void
    {
        $this->emailPedidoEnviado = $emailPedidoEnviado;
    }

    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    public function setEtiqueta($etiqueta): void
    {
        $this->etiqueta = $etiqueta;
    }

    public function getAlmacen()
    {
        return $this->almacen;
    }

    public function setAlmacen($almacen): void
    {
        $this->almacen = $almacen;
    }
}
