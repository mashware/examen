<?php

namespace Javier\Exam\Infrastructure\Controller\Order;

use Javier\Exam\Application\Order\OrderGivenById\OrderGivenById;
use Javier\Exam\Application\Order\OrderGivenById\OrderGivenByIdCommand;
use Javier\Exam\Application\Order\OrdersStatusPaidOut\OrdersStatusPaidOut;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder as DropShippingOrderEntity;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DropShippingOrder extends Controller
{
    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotNull
     * @return array
     * @throws \Exception
     */
    public function showOrdersPaidOut(CheckListOrdersIsNotFound $ordersIsNotNull): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $ordersStatusPaidOut = new OrdersStatusPaidOut($dropShippingRepository, $ordersIsNotNull);

        //return $this->render('base.html.twig', ['orders' => $orders]);
        return $this->json($ordersStatusPaidOut->execute());
    }

    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotNull
     * @return Response
     * @throws \Exception
     */
    public function showOrderById(CheckListOrdersIsNotFound $ordersIsNotNull, Request $request): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $orderGivenById = new OrderGivenById($dropShippingRepository, $ordersIsNotNull);

        $id = $request->get('id');
        $orderGivenByIdCommand = new OrderGivenByIdCommand($id);

        return $this->json($orderGivenById->execute($orderGivenByIdCommand));
    }
}
