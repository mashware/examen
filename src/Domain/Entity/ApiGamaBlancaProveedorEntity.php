<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 10:05
 */

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Infrastructure\Repository\ApiGamaBlancaProveedorEntityRepository")
 */
class ApiGamaBlancaProveedorEntity
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nombre;

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
     * @return ApiGamaBlancaProveedorEntity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Nombre
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set Nombre
     *
     * @param mixed $nombre
     *
     * @return ApiGamaBlancaProveedorEntity
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


}