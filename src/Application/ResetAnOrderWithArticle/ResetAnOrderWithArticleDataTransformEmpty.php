<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:28
 */

namespace App\Application\ResetAnOrderWithArticle;

class ResetAnOrderWithArticleDataTransformEmpty implements ResetAnOrderWithArticleDataTransform
{

    public function transform($orders)
    {
        return $orders;
    }
}