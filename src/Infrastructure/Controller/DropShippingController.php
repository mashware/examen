<?php

namespace App\Controller;

use App\Services\ArticleServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function allOrdersPaid()
    {
        $articles = 'Hola';
        dump($articles);
        die;
        return $this->render('blog/viewAllArticles.html.twig',
                    ['articles' => $articles]);
    }

}