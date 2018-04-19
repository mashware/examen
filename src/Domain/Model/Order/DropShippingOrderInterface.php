<?php

namespace Javier\Exam\Domain\Model\Order;

interface DropShippingOrderInterface
{
    public function showOrdersWithStatusPaidOut(): array;
    public function showOrderById(int $id): array;
    //public function resetOrdersByIdAndArticle(int $id, int $article): bool;
}
