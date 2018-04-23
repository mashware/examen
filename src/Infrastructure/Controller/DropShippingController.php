<?php

namespace App\Infrastructure\Controller;

use App\Application\ChangeProviderFromOrderWithArticle\ChangeProviderFromOrderWithArticle;
use App\Application\ChangeProviderFromOrderWithArticle\ChangeProviderFromOrderWithArticleCommand;
use App\Application\ChangeProviderFromOrderWithArticle\ChangeProviderFromOrderWithArticleDataTransformEmpty;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaidDataTransformJSON;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaid;
use App\Application\GetAllOrdersPaid\GetAllOrdersPaidCommand;
use App\Application\GetAnOrderWithOrderId\GetAnOrderWithOrderId;
use App\Application\GetAnOrderWithOrderId\GetAnOrderWithOrderIdCommand;
use App\Application\GetAnOrderWithOrderId\GetAnOrderWithOrderIdDataTransformJSON;
use App\Application\OrdersPerPage\OrdersPerPage;
use App\Application\OrdersPerPage\OrdersPerPageCommand;
use App\Application\OrdersPerPage\OrdersPerPageDataTransFormJSON;
use App\Application\ResetAnOrderWithArticle\ResetAnOrderWithArticle;
use App\Application\ResetAnOrderWithArticle\ResetAnOrderWithArticleCommand;
use App\Application\ResetAnOrderWithArticle\ResetAnOrderWithArticleDataTransformEmpty;
use App\Application\Services\ResetAnOrderWithParameters;
use Assert\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DropShippingController extends Controller
{
    const INVALID_PARAMETER = 'Invalid Parameter';

    public function allOrdersPaid()
    {
        $order = new GetAllOrdersPaid($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new GetAllOrdersPaidDataTransformJSON());
        return $this->json($order->handler(new GetAllOrdersPaidCommand()));
    }

    public function getAnOrderWithOrderId($orderId)
    {
        try{
            $command = new GetAnOrderWithOrderIdCommand($orderId);
        }catch (InvalidArgumentException $e){
        return $this->json(self::INVALID_PARAMETER, Response::HTTP_BAD_REQUEST);
    }

        $order = new GetAnOrderWithOrderId($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new GetAnOrderWithOrderIdDataTransformJSON());
        $statusReturn = $order->handler($command);
        return $this->json($statusReturn['data'], $statusReturn['status']);
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
        $statusReturn = $order->handler($command);
        return $this->json($statusReturn['message'], $statusReturn['status']);
    }

    /**
     * @param Request $request
     * @param $orderId
     * @param $articleId
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateProviderFromOrderWithArticle(Request $request, $orderId, $articleId)
    {
        try{
            $newProvider = $request->request->get('id_proveedor');
            $command = new ChangeProviderFromOrderWithArticleCommand($orderId, $articleId, $newProvider);
        }catch (InvalidArgumentException $e){
            return $this->json(self::INVALID_PARAMETER, Response::HTTP_BAD_REQUEST);
        }
        $executeOperation = new ChangeProviderFromOrderWithArticle($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new ChangeProviderFromOrderWithArticleDataTransformEmpty());
        $statusReturn = $executeOperation->handler($command);
        return $this->json($statusReturn['message'], $statusReturn['status']);
    }

    public function allOrdersPaidPage($page, $ordersPerPage)
    {
        try{
            $command = new OrdersPerPageCommand($page, $ordersPerPage);
        }catch (InvalidArgumentException $e){
            return $this->json(self::INVALID_PARAMETER, Response::HTTP_BAD_REQUEST);
        }

        $executeOperation = new OrdersPerPage($this->getDoctrine()->getRepository('App:DropShipping\OrderDropShipping'), new OrdersPerPageDataTransFormJSON());
        $statusReturn = $executeOperation->handler($command);

        return $this->json($statusReturn['data'], $statusReturn['status']);

    }

}