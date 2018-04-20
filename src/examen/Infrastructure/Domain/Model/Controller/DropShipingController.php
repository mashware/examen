<?php

namespace App\examen\Infrastructure\Domain\Model\Controller;


use App\examen\Aplication\DropShiping\GetOrder\DataTransformerJSON;
use App\examen\Aplication\DropShiping\GetOrder\GetOrder;
use App\examen\Aplication\DropShiping\GetOrder\GetOrderCommand;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DropShipingController extends Controller
{
    public function getAllOrders()
    {
        $handler = new GetOrder(
            $this->getDoctrine()->getRepository('App:DropShiping\DropShiping'),
            new DataTransformerJSON());

        return new JsonResponse($handler->handler(new GetOrderCommand()));
    }
}
