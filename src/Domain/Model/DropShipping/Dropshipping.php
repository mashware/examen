<?php

namespace App\Domain\Model\DropShipping;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="\App\Infrastructure\Repository\DropShipping\DropshippingDoctrineRepository")
 */
class Dropshipping
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $pedido;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_proveedor;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_sincronizado;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_envio_prevista_min;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_envio_prevista;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_entrega_prevista_min;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_entrega_prevista;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_articulo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pedido_proveedor;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $agencia_enviada;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $emai_pedido_enviado;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $etiqueta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $almacen;

    /**
     * @return mixed
     */
    public function getFechaEntregaPrevistaMin()
    {
        return $this->fecha_entrega_prevista_min;
    }

    /**
     * @param mixed $fecha_entrega_prevista_min
     */
    public function setFechaEntregaPrevistaMin($fecha_entrega_prevista_min)
    {
        $this->fecha_entrega_prevista_min = $fecha_entrega_prevista_min;
    }

    /**
     * @return mixed
     */
    public function getFechaEntregaPrevista()
    {
        return $this->fecha_entrega_prevista;
    }

    /**
     * @param mixed $fecha_entrega_prevista
     */
    public function setFechaEntregaPrevista($fecha_entrega_prevista)
    {
        $this->fecha_entrega_prevista = $fecha_entrega_prevista;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPedido(): ?int
    {
        return $this->pedido;
    }

    public function setPedido(int $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getIdProveedor(): ?int
    {
        return $this->id_proveedor;
    }

    public function setIdProveedor(int $id_proveedor): self
    {
        $this->id_proveedor = $id_proveedor;

        return $this;
    }

    public function getFechaSincronizado(): ?\DateTimeInterface
    {
        return $this->fecha_sincronizado;
    }

    public function setFechaSincronizado(?\DateTimeInterface $fecha_sincronizado): self
    {
        $this->fecha_sincronizado = $fecha_sincronizado;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFechaEnvioPrevistaMin(): ?\DateTimeInterface
    {
        return $this->fecha_envio_prevista_min;
    }

    public function setFechaEnvioPrevistaMin(?\DateTimeInterface $fecha_envio_prevista_min): self
    {
        $this->fecha_envio_prevista_min = $fecha_envio_prevista_min;

        return $this;
    }

    public function getFechaEnvioPrevista(): ?\DateTimeInterface
    {
        return $this->fecha_envio_prevista;
    }

    public function setFechaEnvioPrevista(?\DateTimeInterface $fecha_envio_prevista): self
    {
        $this->fecha_envio_prevista = $fecha_envio_prevista;

        return $this;
    }

    public function getIdArticulo(): ?int
    {
        return $this->id_articulo;
    }

    public function setIdArticulo(?int $id_articulo): self
    {
        $this->id_articulo = $id_articulo;

        return $this;
    }

    public function getPedidoProveedor(): ?int
    {
        return $this->pedido_proveedor;
    }

    public function setPedidoProveedor(?int $pedido_proveedor): self
    {
        $this->pedido_proveedor = $pedido_proveedor;

        return $this;
    }

    public function getAgenciaEnviada(): ?string
    {
        return $this->agencia_enviada;
    }

    public function setAgenciaEnviada(?string $agencia_enviada): self
    {
        $this->agencia_enviada = $agencia_enviada;

        return $this;
    }

    public function getEmaiPedidoEnviado(): ?bool
    {
        return $this->emai_pedido_enviado;
    }

    public function setEmaiPedidoEnviado(?bool $emai_pedido_enviado): self
    {
        $this->emai_pedido_enviado = $emai_pedido_enviado;

        return $this;
    }

    public function getEtiqueta(): ?string
    {
        return $this->etiqueta;
    }

    public function setEtiqueta(?string $etiqueta): self
    {
        $this->etiqueta = $etiqueta;

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
