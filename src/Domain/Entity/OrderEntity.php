<?php

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Infrastructure\Repository\OrderEntityRepository")
 */
class OrderEntity
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
    private $id_proveedor;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fecha_sincronizado;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fecha_envio_prevista_min;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fecha_envio_prevista;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fecha_entrega_prevista_min;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fecha_entrega_prevista;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_articulo;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $pedido_proveedor;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $agencia_enviada;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $email_pedido_enviado;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $etiqueta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $almacen;

    /**
     * Get Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Id
     *
     * @param mixed $id
     *
     * @return OrderEntity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Pedido
     *
     * @return mixed
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set Pedido
     *
     * @param mixed $pedido
     *
     * @return OrderEntity
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get IdProveedor
     *
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * Set IdProveedor
     *
     * @param mixed $id_proveedor
     *
     * @return OrderEntity
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;

        return $this;
    }

    /**
     * Get FechaSincronizado
     *
     * @return mixed
     */
    public function getFechaSincronizado()
    {
        return $this->fecha_sincronizado;
    }

    /**
     * Set FechaSincronizado
     *
     * @param mixed $fecha_sincronizado
     *
     * @return OrderEntity
     */
    public function setFechaSincronizado($fecha_sincronizado)
    {
        $this->fecha_sincronizado = $fecha_sincronizado;

        return $this;
    }

    /**
     * Get Estado
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set Estado
     *
     * @param mixed $estado
     *
     * @return OrderEntity
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get FechaEnvioPrevistaMin
     *
     * @return mixed
     */
    public function getFechaEnvioPrevistaMin()
    {
        return $this->fecha_envio_prevista_min;
    }

    /**
     * Set FechaEnvioPrevistaMin
     *
     * @param mixed $fecha_envio_prevista_min
     *
     * @return OrderEntity
     */
    public function setFechaEnvioPrevistaMin($fecha_envio_prevista_min)
    {
        $this->fecha_envio_prevista_min = $fecha_envio_prevista_min;

        return $this;
    }

    /**
     * Get FechaEnvioPrevista
     *
     * @return mixed
     */
    public function getFechaEnvioPrevista()
    {
        return $this->fecha_envio_prevista;
    }

    /**
     * Set FechaEnvioPrevista
     *
     * @param mixed $fecha_envio_prevista
     *
     * @return OrderEntity
     */
    public function setFechaEnvioPrevista($fecha_envio_prevista)
    {
        $this->fecha_envio_prevista = $fecha_envio_prevista;

        return $this;
    }

    /**
     * Get FechaEntregaPrevistaMin
     *
     * @return mixed
     */
    public function getFechaEntregaPrevistaMin()
    {
        return $this->fecha_entrega_prevista_min;
    }

    /**
     * Set FechaEntregaPrevistaMin
     *
     * @param mixed $fecha_entrega_prevista_min
     *
     * @return OrderEntity
     */
    public function setFechaEntregaPrevistaMin($fecha_entrega_prevista_min)
    {
        $this->fecha_entrega_prevista_min = $fecha_entrega_prevista_min;

        return $this;
    }

    /**
     * Get FechaEntregaPrevista
     *
     * @return mixed
     */
    public function getFechaEntregaPrevista()
    {
        return $this->fecha_entrega_prevista;
    }

    /**
     * Set FechaEntregaPrevista
     *
     * @param mixed $fecha_entrega_prevista
     *
     * @return OrderEntity
     */
    public function setFechaEntregaPrevista($fecha_entrega_prevista)
    {
        $this->fecha_entrega_prevista = $fecha_entrega_prevista;

        return $this;
    }

    /**
     * Get IdArticulo
     *
     * @return mixed
     */
    public function getIdArticulo()
    {
        return $this->id_articulo;
    }

    /**
     * Set IdArticulo
     *
     * @param mixed $id_articulo
     *
     * @return OrderEntity
     */
    public function setIdArticulo($id_articulo)
    {
        $this->id_articulo = $id_articulo;

        return $this;
    }

    /**
     * Get PedidoProveedor
     *
     * @return mixed
     */
    public function getPedidoProveedor()
    {
        return $this->pedido_proveedor;
    }

    /**
     * Set PedidoProveedor
     *
     * @param mixed $pedido_proveedor
     *
     * @return OrderEntity
     */
    public function setPedidoProveedor($pedido_proveedor)
    {
        $this->pedido_proveedor = $pedido_proveedor;

        return $this;
    }

    /**
     * Get AgenciaEnviada
     *
     * @return mixed
     */
    public function getAgenciaEnviada()
    {
        return $this->agencia_enviada;
    }

    /**
     * Set AgenciaEnviada
     *
     * @param mixed $agencia_enviada
     *
     * @return OrderEntity
     */
    public function setAgenciaEnviada($agencia_enviada)
    {
        $this->agencia_enviada = $agencia_enviada;

        return $this;
    }

    /**
     * Get EmailPedidoEnviado
     *
     * @return mixed
     */
    public function getEmailPedidoEnviado()
    {
        return $this->email_pedido_enviado;
    }

    /**
     * Set EmailPedidoEnviado
     *
     * @param mixed $email_pedido_enviado
     *
     * @return OrderEntity
     */
    public function setEmailPedidoEnviado($email_pedido_enviado)
    {
        $this->email_pedido_enviado = $email_pedido_enviado;

        return $this;
    }

    /**
     * Get Etiqueta
     *
     * @return mixed
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Set Etiqueta
     *
     * @param mixed $etiqueta
     *
     * @return OrderEntity
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * Get Almacen
     *
     * @return mixed
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * Set Almacen
     *
     * @param mixed $almacen
     *
     * @return OrderEntity
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }
}
