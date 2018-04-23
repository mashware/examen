<?php

namespace Javier\Exam\Application\Order\StatusPaidOutPaginate;

use Assert\Assertion;

class StatusPaidOutPaginateCommand
{
    private const MIN_RANGE_PAGE = 1;
    private const MAX_RANGE_PAGE = 100000;

    private $page;

    public function __construct($page)
    {
        Assertion::notBlank($page, 'Tienes que especificar una página');
        Assertion::numeric($page, 'El valor de la página tiene que ser un número');
        Assertion::range($page, self::MIN_RANGE_PAGE, self::MAX_RANGE_PAGE, 'El número de página especificado es inválido');

        $this->page = $page;
    }

    public function page(): int
    {
        return $this->page;
    }
}
