<?php

namespace Javier\Exam\Domain\Model\Entity\Provider;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Javier\Exam\Infrastructure\Repository\Provider\ApiGamaBlancaProveedorRepository")
 * @ORM\Table(name="api_gama_blanca_proveedor")
 */
class ApiGamaBlancaProveedor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $nombre;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
}
