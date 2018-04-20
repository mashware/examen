<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 19/04/18
 * Time: 12:11
 */

namespace App\Infrastructure\Controller;

use App\Application\Order\ListAllOrdersPaid\ListAllOrdersPaid;
use App\Application\Order\ListOneOrder\ListOneOrder;
use App\Application\Order\ListOneOrder\ListOneOrderCommand;
use App\Application\Order\ListOneOrder\ListOneOrderDataTransform;
use App\Application\Order\ListOneOrder\ListOneOrderException;
use App\Application\Order\ResetWithOrderAndArticle\ResetWithOrderAndArticle;
use App\Application\Order\ResetWithOrderAndArticle\ResetWithOrderAndArticleCommand;
use App\Application\Order\ResetWithOrderAndArticle\ResetWithOrderAndArticleDataTransform;
use App\Application\Order\ResetWithOrderAndArticle\ResetWithOrderAndArticleException;
use App\Infrastructure\Util\Render\RenderInJson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @param ListAllOrdersPaid $listAllOrdersPaid
     * @Route("/order/dropshipping")
     */

    public function listAllOrdersPaid(ListAllOrdersPaid $listAllOrdersPaid)
    {
        return (new RenderInJson($listAllOrdersPaid->execute()))->render();
    }

    /**
     * @param $order
     * @param $article
     * @return Response
     * @throws \Assert\AssertionFailedException
     * @Route("/order/dropshipping/{order}/article/{article}/reset")
     */
    public function resetWithOrderAndArticle($order, $article): Response
    {
        $resetOrder = new ResetWithOrderAndArticle(
            $this->getDoctrine()
                ->getManager()
                ->getRepository('App:DropshippingPedidos'),
            new ResetWithOrderAndArticleDataTransform()
        );
        try {
            $response = $resetOrder->handle(new ResetWithOrderAndArticleCommand($order, $article));
        } catch (ResetWithOrderAndArticleException $exception) {
            return new Response($exception->getMessage());
        }

        return new Response($response);
    }


    /**
     * @param $order
     * @throws \Assert\AssertionFailedException
     * @Route("/order/dropshipping/{order}")
     */

    public function listOrderById($order)
    {

        $listOrder = new ListOneOrder(
            $this->getDoctrine()
                ->getManager()
                ->getRepository('App:DropshippingPedidos'),
            new ListOneOrderDataTransform()
        );

        try {
            $response = $listOrder->handle(new ListOneOrderCommand($order));
        } catch (ListOneOrderException $exception) {
            return new Response($exception->getMessage());
        }

        return (new RenderInJson($response))->render();
    }
}
