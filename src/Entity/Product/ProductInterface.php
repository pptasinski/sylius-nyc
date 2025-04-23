<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Sylius\Component\Core\Model\ProductInterface as CoreProductInterface;

interface ProductInterface extends CoreProductInterface
{
    public function isOnSale(): bool;

    public function setIsOnSale(bool $isOnSale): void;
}
