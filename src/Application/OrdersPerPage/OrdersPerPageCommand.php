<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 12:43
 */

namespace App\Application\OrdersPerPage;


use Assert\Assertion;

class OrdersPerPageCommand
{
    private $page;
    private $ordersPerPage;

    /**
     * OrdersPerPageCommand constructor.
     * @param $page
     * @param $ordersPerPage
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($page, $ordersPerPage)
    {
        Assertion::numeric($page);
        Assertion::numeric($ordersPerPage);

        $this->page = ($page - 1) * $ordersPerPage;
        $this->ordersPerPage = $ordersPerPage;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function getOrdersPerPage()
    {
        return $this->ordersPerPage;
    }



}