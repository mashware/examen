<?php

namespace App\Controller;

use App\Controller\Util\FillTableOrderEntity;
use App\Domain\Entity\OrderEntity;
use App\Domain\Service\DataTransformerReturnPaidOrders;
use App\Domain\Service\EmptyValidator;
use Infrastructure\Repository\OrderEntityRepository;
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

        $paidOrders = $dropShipping->execute(new EmptyValidator(), new DataTransformerReturnPaidOrders());

        return $this->json(($paidOrders));
    }

    public function reset($order, $article)
    {
        // Incomplete
        return $this->json([
            'message' => $order,
            'path' => $article,
        ]);
    }

    public function paginateEx1($page)
    {
        $result = json_decode($this->returnPaidOrders()->getContent());
        //$result = json_decode($result);
        $result = array_slice($result, 5*($page-1), 5);

        return $this->render('PaginateEx1/paginateEx1.html.twig', [
            'result' => $result,
            'page' => $page
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
