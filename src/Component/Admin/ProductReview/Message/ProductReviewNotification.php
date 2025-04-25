<?php

declare(strict_types=1);

namespace App\Component\Admin\ProductReview\Message;

final class ProductReviewNotification
{
    public function __construct(private readonly string $content)
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
