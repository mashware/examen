<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:25
 */

namespace App\Domain\Entity\DropShipping;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderDropShipping
 * @package App\Domain\Entity\DropShipping
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\DropShipping\Repository\OrderDropShippingDoctrineRepository")
 */
class OrderDropShipping
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $providerId;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSync;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $stateOrder;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $expectedDeliveryDateMin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $expectedDeliveryDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeliveryPlannedMin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeliveryPlanned;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $articleId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orderProvider;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $agencySent;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $emailOrderSent;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $tag;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $warehouse;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
        $this->orderProvider = 0;
        $this->emailOrderSent = false;
        $this->tag = '0';
        $this->warehouse = 0;
        $this->stateOrder = null;
    }

    /**
     * @return integer $id
     */
    public function getId(): integer
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }



    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param mixed $providerId
     */
    public function setProviderId($providerId): void
    {
        $this->providerId = $providerId;
    }

    /**
     * @return mixed
     */
    public function getDateSync()
    {
        return $this->dateSync;
    }

    /**
     * @param mixed $dateSync
     */
    public function setDateSync($dateSync): void
    {
        $this->dateSync = $dateSync;
    }

    /**
     * @return mixed
     */
    public function getStateOrder()
    {
        return $this->stateOrder;
    }

    /**
     * @param mixed
     */
    public function setStateOrder($stateOrder): void
    {
        $this->stateOrder = $stateOrder;
    }

    /**
     * @return mixed
     */
    public function getExpectedDeliveryDateMin()
    {
        return $this->expectedDeliveryDateMin;
    }

    /**
     * @param mixed $expectedDeliveryDateMin
     */
    public function setExpectedDeliveryDateMin($expectedDeliveryDateMin): void
    {
        $this->expectedDeliveryDateMin = $expectedDeliveryDateMin;
    }

    /**
     * @return mixed
     */
    public function getExpectedDeliveryDate()
    {
        return $this->expectedDeliveryDate;
    }

    /**
     * @param mixed $expectedDeliveryDate
     */
    public function setExpectedDeliveryDate($expectedDeliveryDate): void
    {
        $this->expectedDeliveryDate = $expectedDeliveryDate;
    }

    /**
     * @return mixed
     */
    public function getDateDeliveryPlannedMin()
    {
        return $this->dateDeliveryPlannedMin;
    }

    /**
     * @param mixed $dateDeliveryPlannedMin
     */
    public function setDateDeliveryPlannedMin($dateDeliveryPlannedMin): void
    {
        $this->dateDeliveryPlannedMin = $dateDeliveryPlannedMin;
    }

    /**
     * @return mixed
     */
    public function getDateDeliveryPlanned()
    {
        return $this->dateDeliveryPlanned;
    }

    /**
     * @param mixed $dateDeliveryPlanned
     */
    public function setDateDeliveryPlanned($dateDeliveryPlanned): void
    {
        $this->dateDeliveryPlanned = $dateDeliveryPlanned;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param mixed $articleId
     */
    public function setArticleId($articleId): void
    {
        $this->articleId = $articleId;
    }

    /**
     * @return mixed
     */
    public function getOrderProvider()
    {
        return $this->orderProvider;
    }

    /**
     * @param mixed $orderProvider
     */
    public function setOrderProvider($orderProvider): void
    {
        $this->orderProvider = $orderProvider;
    }

    /**
     * @return mixed
     */
    public function getAgencySent()
    {
        return $this->agencySent;
    }

    /**
     * @param mixed $agencySent
     */
    public function setAgencySent($agencySent): void
    {
        $this->agencySent = $agencySent;
    }

    /**
     * @return mixed
     */
    public function getEmailOrderSent(): bool
    {
        return $this->emailOrderSent;
    }

    /**
     * @param mixed $emailOrderSent
     */
    public function setEmailOrderSent(bool $emailOrderSent): void
    {
        $this->emailOrderSent = $emailOrderSent;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @param mixed $warehouse
     */
    public function setWarehouse($warehouse): void
    {
        $this->warehouse = $warehouse;
    }




}