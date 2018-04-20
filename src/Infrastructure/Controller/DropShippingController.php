<?php

namespace App\Infrastructure\Controller;


use App\Application\DropShipping\GetOrder\Command;
use App\Application\DropShipping\GetOrder\DataTransformJson;
use App\Application\DropShipping\GetOrder\GetOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DropShippingController extends Controller
{

    public function index(Request $request)
    {
        $order = new GetOrder(
            $this->getDoctrine()
                 ->getRepository('App\Domain\Model\DropShipping\Dropshipping'), new DataTransformJson());
        return $this->json($order->handler(new Command()));
    }

    public function reset(Request $request,$id,$nombre)
    {

    }

}
