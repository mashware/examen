<?php

namespace App\Controller;

use App\Controller\Util\FillTableOrderEntity;
use App\Domain\Entity\OrderEntity;
use App\Domain\Service\EmptyValidator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $paidOrders = $dropShipping->execute(new EmptyValidator());

        return $this->json(var_dump($paidOrders));
    }

    public function reset($order, $article)
    {
        // Prueba de que llegan los valores introducidos en la ruta
        return $this->json([
            'message' => $order,
            'path' => $article,
        ]);
    }



    public function rellena()
    {
        $orderEntity = (new FillTableOrderEntity())->execute(new OrderEntity());
        $this->getDoctrine()->getRepository(OrderEntity::class)->createOrder($orderEntity);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExamController.php',
        ]);
    }
}
