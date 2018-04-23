<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 19/04/2018
 * Time: 19:09
 */

namespace App\Infrastructure\Controller;



use App\Application\DropShipping\ListAll\ListAllCommand;
use App\Application\DropShipping\ListAll\ListAllDropShippingApplication;
use App\Application\DropShipping\ListAllPaid\ListAllPaidCommand;
use App\Application\DropShipping\ListAllPaid\ListAllPaidDropShippingApplication;
use App\Application\DropShipping\ListByOrderNumberAndArticle\ListByOrderNumberAndArticle;
use App\Application\DropShipping\ListByOrderNumberAndArticle\ListByOrderNumberAndArticleCommand;
use App\Application\DropShipping\ListOneByOrderNumber\ListByOrderNumberCommand;
use App\Application\DropShipping\ListOneByOrderNumber\ListOneDropShippingApplicationOrder;
use App\Application\DropShipping\NewProviderGivenNewProviderOrderNumberAndArticle\NewProviderGivenNewProviderOrderNumberAndArticle;
use App\Application\DropShipping\NewProviderGivenNewProviderOrderNumberAndArticle\NewProviderGivenOrderNumbeAndArticleCommand;
use App\Application\DropShipping\resetOrderGivenNumberAndArticle\ResetOrderGivenNumberAndArticle;
use App\Application\DropShipping\resetOrderGivenNumberAndArticle\ResetOrderGivenNumberAndArticleCommand;
use App\Application\DropShipping\Util\DataTransform\DataTransformToArrayForAllList;
use App\Infrastructure\Repository\DropShippingPedidosDoctrineRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DropShippingOrderController extends Controller
{

    public function listAll()
    {

        $listAllDropShippingApplication = new ListAllDropShippingApplication(
            new DataTransformToArrayForAllList(),
            $this->sendRepository()

        );

        $dataToShow = $listAllDropShippingApplication
            ->handle(new ListAllCommand());


        return $this->json($dataToShow);
    }

    public function listAllPaidStatusByPage(int $page = 1)
    {
        $listAllPaidDropShippingApplication = new ListAllPaidDropShippingApplication(
            new DataTransformToArrayForAllList(),
            $this->sendRepository()

        );

        $dataToShow = $listAllPaidDropShippingApplication
            ->handle(new ListAllPaidCommand($page));


        return $this->json($dataToShow);
    }

    public function listOneByOrderNumber(int $orderNumber)
    {

        $listOneDropShippingApplicationOrder = new ListOneDropShippingApplicationOrder(
            new DataTransformToArrayForAllList(),
            $this->sendRepository()

        );


        $dataToShow = $listOneDropShippingApplicationOrder
            ->handle(new ListByOrderNumberCommand($orderNumber));


        return $this->json($dataToShow);
    }

    public function listByOrderNumberAndArticle(int $orderNumber, int $article)
    {
        $listByOrderNumberAndArticle = new ListByOrderNumberAndArticle(
            new DataTransformToArrayForAllList(),
            $this->sendRepository()
        );


        $dataToShow = $listByOrderNumberAndArticle
            ->handle(new ListByOrderNumberAndArticleCommand($orderNumber, $article));


        return $this->json($dataToShow);
    }

    public function resetByOrderNumberAndArticle(int $orderNumber, int $article)
    {
        $listByOrderNumberAndArticle = new ResetOrderGivenNumberAndArticle(
            $this->sendRepository()
        );

        $dataToShow = $listByOrderNumberAndArticle
            ->handle(new ResetOrderGivenNumberAndArticleCommand($orderNumber, $article));

        return $this->json($dataToShow);
    }

    public function changeProvider(int $orderNumber, int $article, Request $request)
    {
         $provider = $request->request->get('provider');
        $listByOrderNumberAndArticle = new NewProviderGivenNewProviderOrderNumberAndArticle(
            $this->sendRepository()
        );

        $dataToShow = $listByOrderNumberAndArticle
            ->handle(
                new NewProviderGivenOrderNumbeAndArticleCommand($orderNumber, $article, $provider)
            );

        return $this->json($dataToShow);
    }

    private function sendRepository()
    {
         return $this->getDoctrine()->getRepository('App:DropShippingPedidos');
    }
}
