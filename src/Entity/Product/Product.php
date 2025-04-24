<?php

declare(strict_types=1);

namespace App\Entity\Product;

use ApiPlatform\Metadata\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct implements ProductInterface
{
    #[ORM\Column(name: 'is_on_sale', type: 'boolean', options: ['default' => false])]
    #[ApiProperty(readable: true)]
    protected bool $isOnSale = false;

    public function isOnSale(): bool
    {
        return $this->isOnSale;
    }

    public function setIsOnSale(bool $isOnSale): void
    {
        $this->isOnSale = $isOnSale;
    }
}
