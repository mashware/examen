<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 19/04/2018
 * Time: 19:09
 */

namespace App\Infrastructure\Controller;



use App\Application\DropShipping\ListAll\ListAllDropShippingApplication;
use App\Application\DropShipping\ListAllPaid\ListAllPaidDropShippingApplication;
use App\Application\DropShipping\ListByOrderNumberAndArticle\ListByOrderNumberAndArticle;
use App\Application\DropShipping\ListOneByOrderNumber\ListOneDropShippingApplicationOrder;
use App\Application\DropShipping\NewProviderGivenNewProviderOrderNumberAndArticle\NewProviderGivenNewProviderOrderNumberAndArticle;
use App\Application\DropShipping\resetOrderGivenNumberAndArticle\resetOrderGivenNumberAndArticle;
use App\Application\DropShipping\Util\DataTransform\DataTransformToArrayForAllList;
use App\Infrastructure\Repository\DropShippingPedidosDoctrineRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DropShippingOrderController extends Controller
{

    public function listAll()
    {

        $dropShippingRepository = $this->getDoctrine()->getRepository('App:DropShippingPedidos');
        $listAllDropShippingApplication = new ListAllDropShippingApplication(
            new DataTransformToArrayForAllList(),
            $dropShippingRepository

        );

        $dataToShow = $listAllDropShippingApplication->handle();


        return $this->json($dataToShow);
    }

    public function listAllPaidStatus()
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository('App:DropShippingPedidos');
        $listAllPaidDropShippingApplication = new ListAllPaidDropShippingApplication(
            new DataTransformToArrayForAllList(),
            $dropShippingRepository

        );

        $dataToShow = $listAllPaidDropShippingApplication->handle();
        ;

        return $this->json($dataToShow);
    }

    public function listOneByOrderNumber(int $orderNumber)
    {

        $dropShippingRepository = $this->getDoctrine()->getRepository('App:DropShippingPedidos');
        $listOneDropShippingApplicationOrder = new ListOneDropShippingApplicationOrder(
            new DataTransformToArrayForAllList(),
            $dropShippingRepository

        );


        $dataToShow = $listOneDropShippingApplicationOrder->handle($orderNumber);


        return $this->json($dataToShow);
    }

    public function listByOrderNumberAndArticle(int $orderNumber, int $article)
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository('App:DropShippingPedidos');
        $listByOrderNumberAndArticle = new ListByOrderNumberAndArticle(
            new DataTransformToArrayForAllList(),
            $dropShippingRepository

        );


        $dataToShow = $listByOrderNumberAndArticle->handle($orderNumber, $article);


        return $this->json($dataToShow);
    }

    public function resetByOrderNumberAndArticle(int $orderNumber, int $article)
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository('App:DropShippingPedidos');
        $listByOrderNumberAndArticle = new resetOrderGivenNumberAndArticle(
            $dropShippingRepository

        );


        $dataToShow = $listByOrderNumberAndArticle->handle($orderNumber, $article);


        return $this->json($dataToShow);
    }

    public function changeProvider(int $orderNumber, int $article, int $provider)
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository('App:DropShippingPedidos');
        $listByOrderNumberAndArticle = new NewProviderGivenNewProviderOrderNumberAndArticle(
            $dropShippingRepository

        );


        $dataToShow = $listByOrderNumberAndArticle->handle($orderNumber, $article, $provider);


        return $this->json($dataToShow);
    }
}
