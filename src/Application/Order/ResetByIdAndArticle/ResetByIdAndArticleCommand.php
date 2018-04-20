<?php

namespace Javier\Exam\Application\Order\ResetByIdAndArticle;

use Assert\Assertion;

class ResetByIdAndArticleCommand
{
    private $id;
    private $article;

    public function __construct($id, $article)
    {
        Assertion::notBlank($id, 'Tienes que especificar un id de pedido');
        Assertion::numeric($id, 'El id del pedido no es un número');
        Assertion::notBlank($article, 'Tienes que especificar un id de artículo');
        Assertion::numeric($article, 'El id del artículo no es un número');

        $this->id = $id;
        $this->article = $article;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function article(): int
    {
        return $this->article;
    }
}
