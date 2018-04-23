<?php

namespace Javier\Exam\Infrastructure\Controller\Order;

use Javier\Exam\Application\Order\ChangeProviderByIdAndArticle\ChangeProviderByIdAndArticle;
use Javier\Exam\Application\Order\ChangeProviderByIdAndArticle\ChangeProviderByIdAndArticleCommand;
use Javier\Exam\Application\Order\ChangeProviderByIdAndArticle\ChangeProviderByIdAndArticleTransform;
use Javier\Exam\Application\Order\GivenById\GivenById;
use Javier\Exam\Application\Order\GivenById\GivenByIdCommand;
use Javier\Exam\Application\Order\GivenById\GivenByIdTransform;
use Javier\Exam\Application\Order\StatusPaidOut\StatusPaidOut;
use Javier\Exam\Application\Order\StatusPaidOutPaginate\StatusPaidOutPaginate;
use Javier\Exam\Application\Order\StatusPaidOutPaginate\StatusPaidOutPaginateCommand;
use Javier\Exam\Application\Order\StatusPaidOutPaginate\StatusPaidOutPaginateTransform;
use Javier\Exam\Application\Order\StatusPaidOut\StatusPaidOutTransform;
use Javier\Exam\Application\Order\ResetByIdAndArticle\ResetByIdAndArticle;
use Javier\Exam\Application\Order\ResetByIdAndArticle\ResetByIdAndArticleCommand;
use Javier\Exam\Application\Order\ResetByIdAndArticle\ResetByIdAndArticleTransform;
use Javier\Exam\Domain\Model\Entity\Order\DropShippingOrder as DropShippingOrderEntity;
use Javier\Exam\Domain\Service\Order\CheckListOrdersIsNotFound;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DropShippingOrder extends Controller
{
    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotFound
     * @return Response
     * @throws \Exception
     */
    public function showOrdersPaidOut(CheckListOrdersIsNotFound $ordersIsNotFound): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $ordersStatusPaidOutTransform = new StatusPaidOutTransform();
        $ordersStatusPaidOut = new StatusPaidOut(
            $dropShippingRepository,
            $ordersIsNotFound,
            $ordersStatusPaidOutTransform
        );

        return $this->json(
            $ordersStatusPaidOut->execute()
        );
    }

    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotFound
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function showOrderById(CheckListOrdersIsNotFound $ordersIsNotFound, Request $request): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $orderGivenByIdTransform = new GivenByIdTransform();
        $orderGivenById = new GivenById(
            $dropShippingRepository,
            $ordersIsNotFound,
            $orderGivenByIdTransform
        );

        $id = $request->get('id');
        $orderGivenByIdCommand = new GivenByIdCommand($id);

        return $this->json(
            $orderGivenById->execute(
                $orderGivenByIdCommand)
        );
    }

    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotFound
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function resetOrdersByIdAndArticle(CheckListOrdersIsNotFound $ordersIsNotFound, Request $request): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $ResetOrdersGivenByIdAndArticleTransform = new ResetByIdAndArticleTransform();
        $resetOrdersGivenByIdAndArticle = new ResetByIdAndArticle(
            $dropShippingRepository,
            $ordersIsNotFound,
            $ResetOrdersGivenByIdAndArticleTransform
        );

        $id = $request->get('id');
        $article = $request->get('article');
        $resetOrdersGivenByIdAndArticleCommand = new ResetByIdAndArticleCommand($id, $article);

        return $this->json(
            $resetOrdersGivenByIdAndArticle->execute(
                $resetOrdersGivenByIdAndArticleCommand
            )
        );
    }

    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotFound
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function changeProviderOrdersByIdAndArticle(CheckListOrdersIsNotFound $ordersIsNotFound,
                                                       Request $request): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $changeProviderByIdAndArticleTransform = new ChangeProviderByIdAndArticleTransform();
        $changeProviderByIdAndArticle = new ChangeProviderByIdAndArticle(
            $dropShippingRepository,
            $ordersIsNotFound,
            $changeProviderByIdAndArticleTransform
        );

        $id = $request->get('id');
        $article = $request->get('article');
        $id_provider = $request->request->get('provider');
        $changeProviderByIdAndArticleCommand = new ChangeProviderByIdAndArticleCommand($id, $article, $id_provider);

        return $this->json(
            $changeProviderByIdAndArticle->execute(
                $changeProviderByIdAndArticleCommand
            )
        );
    }

    /**
     * @param CheckListOrdersIsNotFound $ordersIsNotFound
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function showOrdersPaidOutPaginate(CheckListOrdersIsNotFound $ordersIsNotFound, Request $request): Response
    {
        $dropShippingRepository = $this->getDoctrine()->getRepository(DropShippingOrderEntity::class);
        $ordersStatusPaidOutPaginateTransform = new StatusPaidOutPaginateTransform();
        $ordersStatusPaidOutPaginate = new StatusPaidOutPaginate(
            $dropShippingRepository,
            $ordersIsNotFound,
            $ordersStatusPaidOutPaginateTransform
        );

        $page = $request->get('page');
        $statusPaidOutPaginateCommand = new StatusPaidOutPaginateCommand($page);

        return $this->json(
            $ordersStatusPaidOutPaginate->execute($statusPaidOutPaginateCommand)
        );
    }
}
