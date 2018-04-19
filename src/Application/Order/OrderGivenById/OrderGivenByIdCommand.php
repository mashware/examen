<?php

namespace Javier\Exam\Application\Order\OrderGivenById;

use Assert\Assertion;

class OrderGivenByIdCommand
{
    private $id;

    public function __construct($id)
    {
        Assertion::notBlank($id, 'Tienes que especificar un id de pedido');
        Assertion::integer($id, 'El id del pedido no es un número');

        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}