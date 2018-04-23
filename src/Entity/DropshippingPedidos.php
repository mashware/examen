<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     */
    private $id_proveedor;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_sincronizado;

    /**
     * @ORM\Column(type="string")
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_envio_prevista_min;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_envio_prevista;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_entrega_prevista_min;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_entrega_prevista;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_articulo;

    /**
     * @ORM\Column(type="bigint")
     */
    private $pedido_proveedor;

    /**
     * @ORM\Column(type="string")
     */
    private $agencia_enviada;

    /**
     * @ORM\Column(type="smallint")
     */
    private $email_pedido_enviado;

    /**
     * @ORM\Column(type="string")
     */
    private $etiqueta;

    /**
     * @ORM\Column(type="integer")
     */
    private $almacen;

    /**
     * DropshippingPedidos constructor.
     * @param $pedido
     * @param $id_proveedor
     * @param $fecha_sincronizado
     * @param $estado
     * @param $fecha_envio_prevista_min
     * @param $fecha_envio_prevista
     * @param $fecha_entrega_prevista_min
     * @param $fecha_entrega_prevista
     * @param $id_articulo
     * @param $pedido_proveedor
     * @param $agencia_enviada
     * @param $email_pedido_enviado
     * @param $etiqueta
     * @param $almacen
     */
    public function __construct(
        int $pedido,
        int $id_proveedor,
        \DateTime $fecha_sincronizado,
        string $estado,
        \DateTime $fecha_envio_prevista_min,
        \DateTime $fecha_envio_prevista,
        \DateTime $fecha_entrega_prevista_min,
        \DateTime $fecha_entrega_prevista,
        int $id_articulo,
        int $pedido_proveedor,
        string $agencia_enviada,
        int $email_pedido_enviado,
        string $etiqueta,
        int $almacen
    )
    {
        $this->pedido = $pedido;
        $this->id_proveedor = $id_proveedor;
        $this->fecha_sincronizado = $fecha_sincronizado;
        $this->estado = $estado;
        $this->fecha_envio_prevista_min = $fecha_envio_prevista_min;
        $this->fecha_envio_prevista = $fecha_envio_prevista;
        $this->fecha_entrega_prevista_min = $fecha_entrega_prevista_min;
        $this->fecha_entrega_prevista = $fecha_entrega_prevista;
        $this->id_articulo = $id_articulo;
        $this->pedido_proveedor = $pedido_proveedor;
        $this->agencia_enviada = $agencia_enviada;
        $this->email_pedido_enviado = $email_pedido_enviado;
        $this->etiqueta = $etiqueta;
        $this->almacen = $almacen;
    }

    /**
     * DropshippingPedidos constructor.
     * @param $pedido
     * @param $id_proveedor
     * @param $fecha_sincronizado
     * @param $estado
     * @param $fecha_envio_prevista_min
     * @param $fecha_envio_prevista
     * @param $fecha_entrega_prevista_min
     * @param $fecha_entrega_prevista
     * @param $id_articulo
     * @param $pedido_proveedor
     * @param $agencia_enviada
     * @param $email_pedido_enviado
     * @param $etiqueta
     * @param $almacen
     */


    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * @param mixed $pedido
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    /**
     * @return mixed
     */
    public function getFechaSincronizado()
    {
        return $this->fecha_sincronizado;
    }

    /**
     * @param mixed $fecha_sincronizado
     */
    public function setFechaSincronizado($fecha_sincronizado)
    {
        $this->fecha_sincronizado = $fecha_sincronizado;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFechaEnvioPrevistaMin()
    {
        return $this->fecha_envio_prevista_min;
    }

    /**
     * @param mixed $fecha_envio_prevista_min
     */
    public function setFechaEnvioPrevistaMin($fecha_envio_prevista_min)
    {
        $this->fecha_envio_prevista_min = $fecha_envio_prevista_min;
    }

    /**
     * @return mixed
     */
    public function getFechaEnvioPrevista()
    {
        return $this->fecha_envio_prevista;
    }

    /**
     * @param mixed $fecha_envio_prevista
     */
    public function setFechaEnvioPrevista($fecha_envio_prevista)
    {
        $this->fecha_envio_prevista = $fecha_envio_prevista;
    }

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

    /**
     * @return mixed
     */
    public function getIdArticulo()
    {
        return $this->id_articulo;
    }

    /**
     * @param mixed $id_articulo
     */
    public function setIdArticulo($id_articulo)
    {
        $this->id_articulo = $id_articulo;
    }

    /**
     * @return mixed
     */
    public function getPedidoProveedor()
    {
        return $this->pedido_proveedor;
    }

    /**
     * @param mixed $pedido_proveedor
     */
    public function setPedidoProveedor($pedido_proveedor)
    {
        $this->pedido_proveedor = $pedido_proveedor;
    }

    /**
     * @return mixed
     */
    public function getAgenciaEnviada()
    {
        return $this->agencia_enviada;
    }

    /**
     * @param mixed $agencia_enviada
     */
    public function setAgenciaEnviada($agencia_enviada)
    {
        $this->agencia_enviada = $agencia_enviada;
    }

    /**
     * @return mixed
     */
    public function getEmailPedidoEnviado()
    {
        return $this->email_pedido_enviado;
    }

    /**
     * @param mixed $email_pedido_enviado
     */
    public function setEmailPedidoEnviado($email_pedido_enviado)
    {
        $this->email_pedido_enviado = $email_pedido_enviado;
    }

    /**
     * @return mixed
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * @param mixed $etiqueta
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }

    /**
     * @return mixed
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * @param mixed $almacen
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;
    }


}
