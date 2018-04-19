<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 14:35
 */

namespace App\Domain\Entity\DropShipping;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderDropShipping
 * @package App\Domain\Entity\DropShipping
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\DropShipping\Repository\ProviderDoctrineRepository")
 */
class Provider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $name;

    public function __construct(string  $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }




}