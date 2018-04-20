<?php

namespace Javier\Exam\Application\Order\ChangeProviderByIdAndArticle;

use Assert\Assertion;

class ChangeProviderByIdAndArticleCommand
{
    private $id;
    private $article;
    private $provider;

    public function __construct($id, $article, $provider)
    {
        Assertion::notBlank($id, 'Tienes que especificar un id de pedido');
        Assertion::numeric($id, 'El id del pedido, no es un número');
        Assertion::notBlank($article, 'Tienes que especificar un id de artículo');
        Assertion::numeric($article, 'El id del artículo, no es un número');
        Assertion::notBlank($provider, 'Tienes que especificar un id de proveedor');
        Assertion::numeric($provider, 'El id del proveedor, no es un número');

        $this->id = $id;
        $this->article = $article;
        $this->provider = $provider;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function article(): int
    {
        return $this->article;
    }

    public function provider(): int
    {
        return $this->provider;
    }
}
