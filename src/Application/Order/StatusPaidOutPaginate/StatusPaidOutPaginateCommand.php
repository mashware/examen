<?php

namespace Javier\Exam\Application\Order\StatusPaidOutPaginate;

use Assert\Assertion;

class StatusPaidOutPaginateCommand
{
    private $page;

    public function __construct($page)
    {
        Assertion::notBlank($page, 'Tienes que especificar una página');
        Assertion::numeric($page, 'El valor de la página tiene que ser un número');

        $this->page = $page;
    }

    public function page(int $maxValue): int
    {
        Assertion::range($this->page, 1, $maxValue, 'La página especificada no existe');

        return $this->page;
    }
}
