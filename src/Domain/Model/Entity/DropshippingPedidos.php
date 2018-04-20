<?php

namespace App\Domain\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DropshippingPedidosRepository")
 */
class DropshippingPedidos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $pedido;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idProveedor;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $fechaSincronizado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaEnvioPrevistaMin;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaEnvioPrevista;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaEntregaPrevistaMin;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaEntregaPrevista;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idArticulo;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $pedidoProveedor;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $agenciaEnviada;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $emailPedidoEnviado;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $etiqueta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $almacen;


    public function getId()
    {
        return $this->id;
    }

    public function getPedido(): ?int
    {
        return $this->pedido;
    }

    public function setPedido(int $pedido)
    {
        $this->pedido = $pedido;
    }

    public function getIdProveedor(): ?int
    {
        return $this->idProveedor;
    }

    public function setIdProveedor(?int $idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    public function getFechaSincronizado(): ?\DateTimeImmutable
    {
        return $this->fechaSincronizado;
    }

    public function setFechaSincronizado(?\DateTimeInterface  $fechaSincronizado)
    {
        $this->fechaSincronizado = $fechaSincronizado;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado)
    {
        $this->estado = $estado;
    }

    public function getFechaEnvioPrevistaMin(): ?\DateTimeInterface
    {
        return $this->fechaEnvioPrevistaMin;
    }

    public function setFechaEnvioPrevistaMin(
        ?\DateTimeInterface $fechaEnvioPrevistaMin
    ) {
        $this->fechaEnvioPrevistaMin = $fechaEnvioPrevistaMin;
    }

    public function getFechaEnvioPrevista(): ?\DateTimeInterface
    {
        return $this->fechaEnvioPrevista;
    }

    public function setFechaEnvioPrevista(\DateTimeInterface $fechaEnvioPrevista)
    {
        $this->fechaEnvioPrevista = $fechaEnvioPrevista;
    }

    public function getFechaEntregaPrevistaMin(): ?\DateTimeInterface
    {
        return $this->fechaEntregaPrevistaMin;
    }

    public function setFechaEntregaPrevistaMin(?\DateTimeInterface $fechaEntregaPrevistaMin)
    {
        $this->fechaEntregaPrevistaMin = $fechaEntregaPrevistaMin;
    }

    public function getFechaEntregaPrevista(): ?\DateTimeInterface
    {
        return $this->fechaEntregaPrevista;
    }

    public function setFechaEntregaPrevista(?\DateTimeInterface $fechaEntregaPrevista)
    {
        $this->fechaEntregaPrevista = $fechaEntregaPrevista;
    }

    public function getIdArticulo(): ?int
    {
        return $this->idArticulo;
    }

    public function setIdArticulo(?int $idArticulo)
    {
        $this->idArticulo = $idArticulo;
    }

    public function getPedidoProveedor(): ?int
    {
        return $this->pedidoProveedor;
    }

    public function setPedidoProveedor(?int $pedidoProveedor)
    {
        $this->pedidoProveedor = $pedidoProveedor;
    }

    public function getAgenciaEnviada(): ?string
    {
        return $this->agenciaEnviada;
    }

    public function setAgenciaEnviada(?string $agenciaEnviada)
    {
        $this->agenciaEnviada = $agenciaEnviada;
    }

    public function getEmailPedidoEnviado(): ?int
    {
        return $this->emailPedidoEnviado;
    }

    public function setEmailPedidoEnviado(?int $emailPedidoEnviado)
    {
        $this->emailPedidoEnviado = $emailPedidoEnviado;
    }

    public function getEtiqueta(): ?string
    {
        return $this->etiqueta;
    }

    public function setEtiqueta(?string $etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }

    public function getAlmacen(): ?int
    {
        return $this->almacen;
    }

    public function setAlmacen(?int $almacen)
    {
        $this->almacen = $almacen;
    }
}
