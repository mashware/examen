<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 13:07
 */

namespace App\Application\DropShipping\ListByOrderNumberAndArticle;


class ListByOrderNumberAndArticleCommand
{
    private $orderNumber;
    private $article;

    /**
     * ListByOrderNumberAndArticleCommand constructor.
     * @param $orderNumber
     * @param $article
     */
    public function __construct(int $orderNumber, int $article)
    {
        $this->orderNumber = $orderNumber;
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    /**
     * @return mixed
     */
    public function getArticle(): int
    {
        return $this->article;
    }


}