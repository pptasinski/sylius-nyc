<?php

declare(strict_types=1);

namespace App\Component\Admin\Term\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(event: 'sylius.menu.admin.main', method: 'add')]
final class AdminMenuListener
{
    public function add(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        $catalog = $menu->getChild('catalog');

        $catalog
            ->addChild('terms', ['route' => 'app_admin_term_index', 'extras' => []])
            ->setLabel('sylius.menu.admin.main.catalog.terms');
    }
}
