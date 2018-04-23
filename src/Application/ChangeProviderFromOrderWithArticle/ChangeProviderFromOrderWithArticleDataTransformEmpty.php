<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 10:20
 */

namespace App\Application\ChangeProviderFromOrderWithArticle;


class ChangeProviderFromOrderWithArticleDataTransformEmpty implements ChangeProviderFromOrderWithArticleDataTransform
{
    public function transform($orders)
    {
        return $orders;
    }
}