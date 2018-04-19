<?php

namespace App\examen\Infrastructure\Domain\Model\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DropShipingController extends Controller
{
    /**
     * @Route("/drop", name="drop")
     */
    public function index()
    {
        return $this->render('drop/index.html.twig', [
            'controller_name' => 'DropShipingController',
        ]);
    }
}
