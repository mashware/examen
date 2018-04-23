<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 10:19
 */

namespace App\Application\ChangeProviderFromOrderWithArticle;


use Assert\Assertion;

class ChangeProviderFromOrderWithArticleCommand
{

    private $orderId;
    private $articleId;
    private $newProvider;

    /**
     * ChangeProviderFromOrderWithArticleCommand constructor.
     * @param $orderId
     * @param $articleId
     * @param $newProvider
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($orderId, $articleId, $newProvider)
    {
        Assertion::numeric($newProvider);
        Assertion::numeric($articleId);
        Assertion::numeric($orderId);

        $this->orderId = $orderId;
        $this->articleId = $articleId;
        $this->newProvider = $newProvider;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @return mixed
     */
    public function getNewProvider()
    {
        return $this->newProvider;
    }




}