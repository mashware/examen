<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 17:10
 */

namespace App\Application\DropShipping\resetOrderGivenNumberAndArticle;


class ResetOrderGivenNumberAndArticleCommand
{
    private $orderNumber;
    private $article;

    /**
     * resetOrderGivenNumberAndArticleCommand constructor.
     * @param $orderNumber
     * @param $article
     */
    public function __construct(int $orderNumber, int $article)
    {
        $this->orderNumber = $orderNumber;
        $this->article = $article;
    }

    /**
     * @return int
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    /**
     * @return int
     */
    public function getArticle(): int
    {
        return $this->article;
    }
}
