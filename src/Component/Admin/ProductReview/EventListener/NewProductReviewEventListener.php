<?php

declare(strict_types=1);

namespace App\Component\Admin\ProductReview\EventListener;

use Psr\Log\LoggerInterface;
use Sylius\Component\Core\Model\ProductReviewInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Workflow\Event\Event;

#[AsEventListener(event: 'workflow.sylius_product_review.completed.accept', method: 'log')]
final readonly class NewProductReviewEventListener
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function log(Event $event): void
    {
        $subject = $event->getSubject();
        if ($subject instanceof ProductReviewInterface) {
            $this->logger->info('New product review created', ['product' => $subject->getReviewSubject()?->getName()]);
        }
    }
}
