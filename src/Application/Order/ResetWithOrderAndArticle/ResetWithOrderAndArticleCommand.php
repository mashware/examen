<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 9:21
 */

namespace App\Application\Order\ResetWithOrderAndArticle;

use Assert\Assertion;

class ResetWithOrderAndArticleCommand
{
    private $order;
    private $article;

    /**
     * ResetWithOrderAndArticleCommand constructor.
     * @param $order
     * @param $article
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($order, $article)
    {
        Assertion::numeric($order, 'Debes insertar un número');
        Assertion::numeric($article, 'Debes insertar un número');
        $this->order = $order;
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function order()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function article()
    {
        return $this->article;
    }
}
