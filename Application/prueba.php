<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 20/04/18
 * Time: 13:31
 */

use App\Domain\Entity\OrderEntity;
use App\Domain\Service\DataTransformerReturnPaidOrders;
use App\Domain\Service\EmptyValidator;
use Application\DropShipping\DropShipping;

require __DIR__.'/../vendor/autoload.php';

$vjson = '{
    "blog" : { "titulo":"Borrowbits"
},
"usuario": {
        "nombre":"Angel",
"permisos":"Admin"
},
"usuario": {
        "nombre":"Vicente",
"permisos":"Admin"
},
"usuario": {
        "nombre":"Dario",
"permisos":"Autor",
"articulos":16
}
}';

$vdecoded = json_decode($vjson);

echo $vdecoded->blog;

