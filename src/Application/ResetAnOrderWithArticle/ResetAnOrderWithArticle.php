<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:43
 */

namespace App\Application\ResetAnOrderWithArticle;


use App\Application\Services\ResetAnOrderWithParameters;
use App\Domain\Entity\DropShipping\OrderNotFoundException;
use App\Infrastructure\Entity\DropShipping\Repository\OrderDropShippingDoctrineRepository;
use Symfony\Component\HttpFoundation\Response;

class ResetAnOrderWithArticle
{
    const STATUS_ORDER = "NUEVO";
    const WAREHOUSE = 0;
    const ORDER_PROVIDER = 0;
    const PROVIDER_ID = 0;

    private $orderRepository;
    private $dataTransform;
    private $reset;

    public function __construct(OrderDropShippingDoctrineRepository $orderRepository, ResetAnOrderWithArticleDataTransform $dataTransform, ResetAnOrderWithParameters $reset)
    {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
        $this->reset = $reset;
    }

    /**
     * @param ResetAnOrderWithArticleCommand $command
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handler(ResetAnOrderWithArticleCommand $command)
    {
        try {
            $arrayOrdersWithArticle = $this->orderRepository->getOrdersDropShippingWithOrderIdOrFail($command->getOrderId(), $command->getArticleId());
        } catch (OrderNotFoundException $e) {
            return $this->dataTransform->transform(['message' => 'KO', 'status' => Response::HTTP_NOT_FOUND]);
        }

        foreach ($arrayOrdersWithArticle as $orderArticle) {
            $this->reset->execute($orderArticle, self::STATUS_ORDER,self::ORDER_PROVIDER, self::WAREHOUSE, self::PROVIDER_ID);
        }

        $this->orderRepository->flush();

        return $this->dataTransform->transform(['message' => 'OK', 'status' => Response::HTTP_OK]);
    }
}