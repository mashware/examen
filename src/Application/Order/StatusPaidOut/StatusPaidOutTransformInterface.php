<?php

namespace Javier\Exam\Application\Order\StatusPaidOut;

interface StatusPaidOutTransformInterface
{
    public function transform(array $orders);
}