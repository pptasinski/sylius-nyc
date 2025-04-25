<?php

declare(strict_types=1);

namespace App\Component\Admin\ProductReview\EventListener;

use App\Component\Admin\ProductReview\Message\ProductReviewNotification;
use Psr\Log\LoggerInterface;
use Sylius\Component\Core\Model\ProductReviewInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Workflow\Event\Event;

#[AsEventListener(event: 'workflow.sylius_product_review.completed.accept', method: 'log')]
final readonly class NewProductReviewEventListener
{
    public function __construct(
        private LoggerInterface $logger,
        private MessageBusInterface $messageBus,
    )
    {
    }

    public function log(Event $event): void
    {
        $subject = $event->getSubject();
        if ($subject instanceof ProductReviewInterface) {
            $productName = $subject->getReviewSubject()?->getName();
            $this->logger->info('New product review created', ['product' => $productName]);
            $this->messageBus->dispatch(new ProductReviewNotification(
                sprintf('New product review created for %s', $productName),
            ));
        }
    }
}
