<?php

namespace App\Controller;

use App\Controller\Util\FillTableOrderEntity;
use App\Domain\Entity\OrderEntity;
use App\Domain\Service\DataTransformerReturnPaidOrders;
use App\Domain\Service\EmptyEntityValidator;
use App\Domain\Service\EmptyQueryOutputValidator;
use App\Domain\Service\ResetService;
use Application\DropShipping\DropShippingReset;
use Application\DropShipping\DropShippingReturnOrder;
use Infrastructure\Repository\OrderEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Application\DropShipping\DropShipping;

class ExamController extends Controller
{
    public function returnPaidOrders(): Response
    {
        $dropShipping = new DropShipping(
            $this->getDoctrine()
                ->getRepository(
                    OrderEntity::class
                )
        );

        $paidOrders = $dropShipping->execute(new EmptyQueryOutputValidator(), new DataTransformerReturnPaidOrders());

        return $this->json(($paidOrders));
    }

    public function reset($order, $article)
    {
        $dropShippingReset = new DropShippingReset(
            $this->getDoctrine()
                ->getRepository(
                    OrderEntity::class
                )
        );

        $dropShippingReset->execute(new EmptyEntityValidator(), new ResetService(), $order, $article);

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

        $queryOrder = $dropShippingReturnOrder->execute(new EmptyQueryOutputValidator(), $order);

        return $this->json($queryOrder);
    }

    public function updateProvider($order, $article)
    {
        $repository =
            $this->getDoctrine()
                ->getRepository(
                    OrderEntity::class
                );

        $product = $repository->findOneBy([
            'pedido' => $order,
            'id_articulo' => $article
        ]);

        return $this->json($product->getFechaEntregaPrevista());

    }

    public function paginateEx1($page): Response
    {
        $result = json_decode($this->returnPaidOrders()->getContent());
        $result = array_slice($result, 5*($page-1), 5);

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
