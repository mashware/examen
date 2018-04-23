<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 14:17
 */

namespace Application\DropShipping\DropShippingPaginateEx1;

use Assert\Assertion;

class DropShippingPaginateEx1Command
{
    private $page;

    /**
     * DropShippingPaginateEx1Command constructor.
     *
     * @param $page
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($page)
    {
        Assertion::notBlank($page, 'Tiene que especificar una página');
        Assertion::numeric($page, 'La página debe ser un numero');
        Assertion::greaterThan($page, 0, 'La página debe ser un número mayor que 0');
        $this->page = $page;
    }

    /**
     * Get Page
     *
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }
}