<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:37
 */

namespace App\Infraestructure\Render\RenderInJSON;

use App\Infraestructure\Render\RenderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class RenderInJSON implements RenderInterface
{
    private $dataArray;

    /**
     * RenderInJSON constructor.
     * @param $dataArray
     */
    public function __construct($dataArray)
    {
        $this->dataArray = $dataArray;
    }

    public function render(): string
    {
        return (new JsonEncoder())->encode($this->dataArray,'json');
    }
}