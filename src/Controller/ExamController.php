<?php

namespace App\Controller;

use App\Controller\Util\FillTableOrderEntity;
use App\Domain\Entity\OrderEntity;
use Application\DropShipping\DataTransformerPaginateEx1;
use Application\DropShipping\DataTransformerReturnPaidOrders;
use Application\DropShipping\DropShippingReset;
use Application\DropShipping\DropShippingResetCommand;
use Application\DropShipping\DropShippingReturnOrder;
use Application\DropShipping\DropShippingReturnOrderCommand;
use Application\DropShipping\DropShippingUpdateProvider;
use Application\DropShipping\DropShippingUpdateProviderCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Application\DropShipping\DropShipping;

class ExamController extends Controller
{
    public const NUMORDERSPERPAGE = 5;

    public function returnPaidOrders(): Response
    {
        $dropShipping = new DropShipping(
            $this->getDoctrine()->getRepository(
                OrderEntity::class
            ),
            new DataTransformerReturnPaidOrders()
        );
        return $this->json(($dropShipping->execute()));
    }

    public function reset($order, $article)
    {
        $dropShippingReset = new DropShippingReset(
            $this->getDoctrine()
                ->getRepository(
                    OrderEntity::class
                )
        );

        $dropShippingReset->execute(new DropShippingResetCommand($order, $article));

        return $this->json(['200' => 'ok']);
    }

    public function returnOrder($order): Response
    {
        $dropShippingReturnOrder = new DropShippingReturnOrder(
            $this->getDoctrine()
                ->getRepository(
                    OrderEntity::class
                )
        );

        $queryOrder = $dropShippingReturnOrder->execute(new DropShippingReturnOrderCommand($order));

        return $this->json($queryOrder);
    }

    public function updateProvider($order, $article, Request $request)
    {
        $provider = $request->request->get('provider');

        $dropShippingUpdateProvider = new DropShippingUpdateProvider(
            $this->getDoctrine()
                ->getRepository(
                    OrderEntity::class
                )
        );

        $dropShippingUpdateProvider->execute(new DropShippingUpdateProviderCommand($order, $article, $provider));

        return $this->json(
            [
                '200' => 'Ok'
            ]
        );
    }

    public function paginateEx1($page): Response
    {
        $result = json_decode($this->returnPaidOrders()->getContent());
        $result = (new DataTransformerPaginateEx1())->execute($result, $page);

        return $this->render(
            'PaginateEx1/paginateEx1.html.twig',
            [
                'result' => $result,
                'page' => $page
            ]
        );
    }

    public function rellena(): Response
    {
        $orderEntity = (new FillTableOrderEntity())->execute(new OrderEntity());
        $this->getDoctrine()->getRepository(OrderEntity::class)->persist($orderEntity);

        return $this->json([
            'message' => 'Insertado un pedido en la tabla',
        ]);
    }
}
