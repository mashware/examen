<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 11:40
 */

namespace App\Infraestructure\Controller;


use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderByPedido;
use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderCommand;
use App\Aplication\HandleOperations\Dropshipping\GetOrderByPedido\GetOrderDataTransform;
use App\Aplication\HandleOperations\Dropshipping\GetPaidOrders\GetPaidOrdersTransform;
use App\Aplication\HandleOperations\Dropshipping\GetPaidOrders\SelectAllOrders;
use App\Aplication\HandleOperations\Dropshipping\GetPaidOrders\GetPaidOrders;
use App\Aplication\HandleOperations\Dropshipping\ResetOrders\ResetOrderByIdPedidoAndIdArticle;
use App\Aplication\HandleOperations\Dropshipping\ResetOrders\ResetOrderCommand;
use App\Entity\AlreadyResetOrder;
use App\Entity\DropshippingPedidos;
use App\Entity\NotFindDropshippingOrderException;
use App\Infraestructure\Render\RenderInJSON\RenderInJSON;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class MainController extends Controller
{

    public function getDropshippingOrdersAll(EntityManagerInterface $entityManager)
    {
        $orders = (new SelectAllOrders(
            $entityManager->getRepository('App:DropshippingPedidos'),
            new GetPaidOrdersTransform())
        )->execute();

        dump($orders);

        return JsonResponse::fromJsonString((new RenderInJSON($orders))->render());
    }

    public function getDropshippingOrders(EntityManagerInterface $entityManager)
    {

        try {
            $orders = (new GetPaidOrders(
                $entityManager->getRepository('App:DropshippingPedidos'),
                new GetPaidOrdersTransform())
            )->execute();
        } catch (NotFindDropshippingOrderException $e) {
        }

        return JsonResponse::fromJsonString((new RenderInJSON($orders))->render());

    }

    public function resetOrderByIdPedidoAndIdArticulo($idPedido, $idAritculo)
    {
        $response = 'OK';

        try {
            (new ResetOrderByIdPedidoAndIdArticle(
                $this->getDoctrine()->getManager()->getRepository('App:DropshippingPedidos')
            ))->handle(new ResetOrderCommand($idPedido, $idAritculo));

        } catch (NotFindDropshippingOrderException $e) {
            $response = $e->getMessage();
        } catch (AlreadyResetOrder$e) {
            $response = $e->getMessage();
        }

        return new Response($response);
    }

    public function getOrderByIdPedido($idPedido)
    {
        try {
            $order = (new GetOrderByPedido(
                $this
                    ->getDoctrine()
                    ->getManager()
                    ->getRepository('App:DropshippingPedidos'),
                new GetOrderDataTransform()
            ))->execute(new GetOrderCommand($idPedido));
        } catch (NotFindDropshippingOrderException $e) {
            return new Response($e->getMessage());
        }

        return JsonResponse::fromJsonString((new RenderInJSON($order))->render());
    }

    public function insertTestData(EntityManagerInterface $entityManager)
    {
        $product = new DropshippingPedidos(
            1,
            2,
            new \DateTime(),
            "PAGADO",
            new \DateTime(),
            new \DateTime(),
            new \DateTime(),
            new \DateTime(),
            23,
            23,
            'tourline',
            0,
            'etiqueta',
            0
        );


        $entityManager->getRepository('App:DropshippingPedidos')->persistAndFlush($product);

        return new Response('Insertado');
    }
}