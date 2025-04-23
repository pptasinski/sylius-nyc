<?php

declare(strict_types=1);

namespace App\Component\Admin\Product\Form;

use Sylius\Bundle\AdminBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isOnSale', null, [
                'label' => 'sylius.form.product.is_on_sale',
                'required' => false,
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [
            ProductType::class
        ];
    }
}
