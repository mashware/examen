<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 13:06
 */

namespace Application\DropShipping;

use Assert\Assertion;

class DropShippingUpdateProviderCommand
{
    private $article;
    private $order;
    private $provider;

    public function __construct($order, $article, $provider)
    {
        Assertion::notBlank($order, 'Tienes que especificar un id de pedido');
        Assertion::numeric($order, 'El id del pedido no es un número');
        Assertion::notBlank($article, 'Tienes que especificar un id de artículo');
        Assertion::numeric($article, 'El id del artículo no es un número');
        Assertion::notBlank($provider, 'Tienes que especificar un proveedor');
        Assertion::numeric($provider, 'El proveedro no es un numero');

        $this->order = $order;
        $this->article = $article;
        $this->provider = $provider;
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

    /**
     * Get Provider
     *
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }
}