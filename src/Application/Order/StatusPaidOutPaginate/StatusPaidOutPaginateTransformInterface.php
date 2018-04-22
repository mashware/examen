<?php

namespace Javier\Exam\Application\Order\StatusPaidOutPaginate;

interface StatusPaidOutPaginateTransformInterface
{
    public function transform(array $orders);
}
