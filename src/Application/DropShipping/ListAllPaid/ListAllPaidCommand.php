<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 12:51
 */

namespace App\Application\DropShipping\ListAllPaid;


class ListAllPaidCommand
{
    private $page;

    /**
     * ListAllPaidCommand constructor.
     * @param $page
     */
    public function __construct($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }



}
