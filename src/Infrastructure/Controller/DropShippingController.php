<?php

namespace App\Infrastructure\Controller;

use App\Application\GetAllOrdersPaid\DataTransformJSON;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaid;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaidCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DropShippingController extends Controller
{
    public function allOrdersPaid()
    {
        $order = new GetAllOrdersPaid($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new DataTransformJSON());
        $arr = $order->handler(new GetAllOrdersPaidCommand());
        dump($arr);
        die;
    }

}