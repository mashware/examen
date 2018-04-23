<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/04/18
 * Time: 8:39
 */

namespace Application\DropShipping;

use App\Controller\ExamController;

class DataTransformerPaginateEx1
{
    public function execute(array $inputArrayPages, $page): array
    {
        return array_slice($inputArrayPages, ExamController::NUMORDERSPERPAGE*($page-1), ExamController::NUMORDERSPERPAGE);
    }
}