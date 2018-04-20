<?php

namespace App\Infrastructure\Controller;

use App\Application\GetAllOrdersPaid\GetAllOrdersPaidDataTransformJSON;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaid;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaidCommand;
use App\Application\ResetAnOrderWithArticle\ResetAnOrderWithArticle;
use App\Application\ResetAnOrderWithArticle\ResetAnOrderWithArticleCommand;
use App\Application\ResetAnOrderWithArticle\ResetAnOrderWithArticleDataTransformEmpty;
use App\Application\Services\ResetAnOrderWithParameters;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DropShippingController extends Controller
{
    public function allOrdersPaid()
    {
        $order = new GetAllOrdersPaid($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new GetAllOrdersPaidDataTransformJSON());
        return $this->json($order->handler(new GetAllOrdersPaidCommand()));
    }

    /**
     * @param $orderId
     * @param $articleId
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function resetAnOrderWithArticle($orderId, $articleId)
    {
        $command = new ResetAnOrderWithArticleCommand($orderId, $articleId);
        $order = new ResetAnOrderWithArticle($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new ResetAnOrderWithArticleDataTransformEmpty(), new ResetAnOrderWithParameters());
        return $this->json($order->handler($command));

    }

}