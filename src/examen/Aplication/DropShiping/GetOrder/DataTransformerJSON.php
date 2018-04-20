<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 20/04/18
 * Time: 8:37
 */
namespace App\examen\Aplication\DropShiping\GetOrder;
use Symfony\Component\HttpFoundation\JsonResponse;

class DataTransformerJSON implements DataTransformer
{

    public function transform(Array $array)
    {
        $all = [];
       foreach ($array as $in){
           $all = [
               'id' => $in->getId(),
               'id_articulo' => $in->getIdArticulo()
           ];
       }
       return $all;
    }
}