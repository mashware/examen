<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 10:19
 */

namespace App\Application\ChangeProviderFromOrderWithArticle;


use App\Domain\Entity\DropShipping\OrderNotFoundException;
use App\Infrastructure\Entity\DropShipping\Repository\OrderDropShippingDoctrineRepository;
use Symfony\Component\HttpFoundation\Response;

class ChangeProviderFromOrderWithArticle
{

    private $orderRepository;
    private $dataTransform;

    public function __construct(OrderDropShippingDoctrineRepository $orderRepository, ChangeProviderFromOrderWithArticleDataTransform $dataTransform)
    {
        $this->orderRepository = $orderRepository;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @param ChangeProviderFromOrderWithArticleCommand $command
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handler(ChangeProviderFromOrderWithArticleCommand $command)
    {
        try {
            $order = $this->orderRepository->getOrdersDropShippingWithOrderIdOrFail($command->getOrderId(), $command->getArticleId());
        } catch (OrderNotFoundException $e) {
            return $this->dataTransform->transform(['message' => 'KO', 'status' => Response::HTTP_NOT_FOUND]);
        }

        $order[0]->setProviderId($command->getNewProvider());
        $this->orderRepository->flush();

        return $this->dataTransform->transform(['message' => 'OK', 'status' => Response::HTTP_OK]);

    }
}