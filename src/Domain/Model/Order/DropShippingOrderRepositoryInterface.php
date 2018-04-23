<?php

namespace Javier\Exam\Domain\Model\Order;

interface DropShippingOrderRepositoryInterface
{
    public function showOrdersWithStatusPaidOut(): array;
    public function showOrdersWithStatusPaidOutPaginate(int $page): array;
    public function showOrderById(int $id): array;
    public function resetOrdersByIdAndArticle(int $id, int $article): array;
    public function changeProviderOrdersByIdAndArticle(int $id, int $article, int $repository): array;
}
