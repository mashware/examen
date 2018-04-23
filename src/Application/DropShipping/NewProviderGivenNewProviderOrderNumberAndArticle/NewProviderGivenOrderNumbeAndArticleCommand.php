<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 20/04/2018
 * Time: 17:47
 */

namespace App\Application\DropShipping\NewProviderGivenNewProviderOrderNumberAndArticle;


class NewProviderGivenOrderNumbeAndArticleCommand
{
    private $orderNumber;
    private $article;
    private $provider;

    /**
     * NewProviderGivenOrderNumbeAndArticleCommand constructor.
     * @param $orderNumber
     * @param $article
     * @param $provider
     */
    public function __construct(int $orderNumber, int $article, $provider)
    {
        $this->orderNumber = $orderNumber;
        $this->article = $article;
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    /**
     * @return mixed
     */
    public function getArticle(): int
    {
        return $this->article;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }
}
