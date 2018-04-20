<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:39
 */

namespace App\Application\DropShipping\GetOrder;


use App\Infrastructure\Repository\DropShipping\DropshippingDoctrineRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetOrder
{
    private $repository;
    private $dataTransform;

    public function __construct(DropshippingDoctrineRepository $repository, DataTransform $dataTransform)
    {
        $this->repository = $repository;
        $this->dataTransform = $dataTransform;
    }

    public function handler(Command $command)
    {
        return $this->dataTransform->transform($this->repository->getAll());
    }
}