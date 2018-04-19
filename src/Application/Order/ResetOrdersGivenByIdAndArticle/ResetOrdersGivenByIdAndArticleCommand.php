<?php

namespace Javier\Exam\Application\Order\ResetOrdersGivenByIdAndArticle;

use Assert\Assertion;

class ResetOrdersGivenByIdAndArticleCommand
{
    private $id;
    private $article;

    public function __construct($id, $article)
    {
        Assertion::notBlank($id, 'Tienes que especificar un id de pedido');
        Assertion::integer($id, 'El id del pedido no es un número');
        Assertion::notBlank($article, 'Tienes que especificar un id de artículo');
        Assertion::integer($article, 'El id del artículo no es un número');

        $this->id = $id;
        $this->article = $article;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getArticle(): int
    {
        return $this->article;
    }
}
