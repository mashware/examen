<?php

namespace Javier\Exam\Application\Order\GivenById;

use Assert\Assertion;

class GivenByIdCommand
{
    private $id;

    public function __construct($id)
    {
        Assertion::notBlank($id, 'Tienes que especificar un id de pedido');
        Assertion::numeric($id, 'El id del pedido no es un número');

        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }
}