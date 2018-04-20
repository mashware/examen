<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 12:31
 */

namespace App\Infrastructure\Util\Render;

use Symfony\Component\HttpFoundation\JsonResponse;

class RenderInJson implements Render
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return JsonResponse::create($this->order, 200);
    }
}