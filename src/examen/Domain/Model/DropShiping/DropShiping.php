<?php

namespace App\examen\Domain\Model\DropShiping;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\examen\Infrastructure\Domain\Model\Repository\OrderRepository")
 */
class DropShiping
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pedido;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idProveedor;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaSincronizada;

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
    private $pedidoProveedor;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $agenciaEnviada;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idArticulo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $emailPedidoEnviada;

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

    public function setPedido(?int $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getIdProveedor(): ?int
    {
        return $this->idProveedor;
    }

    public function setIdProveedor(?int $idProveedor): self
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    public function getFechaSincronizada(): ?\DateTimeInterface
    {
        return $this->fechaSincronizada;
    }

    public function setFechaSincronizada(?\DateTimeInterface $fechaSincronizada): self
    {
        $this->fechaSincronizada = $fechaSincronizada;

        return $this;
    }

    public function getFechaEnvioPrevistaMin(): ?\DateTimeInterface
    {
        return $this->fechaEnvioPrevistaMin;
    }

    public function setFechaEnvioPrevistaMin(?\DateTimeInterface $fechaEnvioPrevistaMin): self
    {
        $this->fechaEnvioPrevistaMin = $fechaEnvioPrevistaMin;

        return $this;
    }

    public function getFechaEnvioPrevista(): ?\DateTimeInterface
    {
        return $this->fechaEnvioPrevista;
    }

    public function setFechaEnvioPrevista(?\DateTimeInterface $fechaEnvioPrevista): self
    {
        $this->fechaEnvioPrevista = $fechaEnvioPrevista;

        return $this;
    }

    public function getFechaEntregaPrevistaMin(): ?\DateTimeInterface
    {
        return $this->fechaEntregaPrevistaMin;
    }

    public function setFechaEntregaPrevistaMin(?\DateTimeInterface $fechaEntregaPrevistaMin): self
    {
        $this->fechaEntregaPrevistaMin = $fechaEntregaPrevistaMin;

        return $this;
    }

    public function getFechaEntregaPrevista(): ?\DateTimeInterface
    {
        return $this->fechaEntregaPrevista;
    }

    public function setFechaEntregaPrevista(?\DateTimeInterface $fechaEntregaPrevista): self
    {
        $this->fechaEntregaPrevista = $fechaEntregaPrevista;

        return $this;
    }

    public function getPedidoProveedor(): ?int
    {
        return $this->pedidoProveedor;
    }

    public function setPedidoProveedor(?int $pedidoProveedor): self
    {
        $this->pedidoProveedor = $pedidoProveedor;

        return $this;
    }

    public function getAgenciaEnviada(): ?string
    {
        return $this->agenciaEnviada;
    }

    public function setAgenciaEnviada(?string $agenciaEnviada): self
    {
        $this->agenciaEnviada = $agenciaEnviada;

        return $this;
    }

    public function getIdArticulo(): ?int
    {
        return $this->idArticulo;
    }

    public function setIdArticulo(?int $idArticulo): self
    {
        $this->idArticulo = $idArticulo;

        return $this;
    }

    public function getEmailPedidoEnviada(): ?bool
    {
        return $this->emailPedidoEnviada;
    }

    public function setEmailPedidoEnviada(?bool $emailPedidoEnviada): self
    {
        $this->emailPedidoEnviada = $emailPedidoEnviada;

        return $this;
    }

    public function getAlmacen(): ?int
    {
        return $this->almacen;
    }

    public function setAlmacen(?int $almacen): self
    {
        $this->almacen = $almacen;

        return $this;
    }
}
