<?php

declare(strict_types=1);

namespace App\Entity\Term;

use Sylius\Resource\Model\ResourceInterface;

interface TermInterface extends ResourceInterface
{
    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function getBody(): ?string;

    public function setBody(?string $body): void;
}
