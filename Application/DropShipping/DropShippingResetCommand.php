<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:47
 */

namespace Application\DropShipping;

use Assert\Assertion;

class DropShippingResetCommand
{
    private $article;
    private $order;

    public function __construct($order, $article)
    {
        Assertion::notBlank($order, 'Tienes que especificar un id de pedido');
        Assertion::numeric($order, 'El id del pedido no es un número');
        Assertion::notBlank($article, 'Tienes que especificar un id de artículo');
        Assertion::numeric($article, 'El id del artículo no es un número');

        $this->order = $order;
        $this->article = $article;
    }

    /**
     * Get Article
     *
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Get Order
     *
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }
}
