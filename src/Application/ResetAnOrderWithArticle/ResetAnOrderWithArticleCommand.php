<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 11:44
 */

namespace App\Application\ResetAnOrderWithArticle;


class ResetAnOrderWithArticleCommand
{
    private $orderId;
    private $articleId;

    public function __construct(int $orderId, int $articleId)
    {
        $this->orderId = $orderId;
        $this->articleId = $articleId;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

}