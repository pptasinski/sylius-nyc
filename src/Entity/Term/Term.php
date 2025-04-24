<?php

declare(strict_types=1);

namespace App\Entity\Term;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Component\Admin\Term\Grid\TermGrid;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Resource\Metadata\AsResource;
use Sylius\Resource\Metadata\BulkDelete;
use Sylius\Resource\Metadata\Create;
use Sylius\Resource\Metadata\Delete;
use Sylius\Resource\Metadata\Index;
use Sylius\Resource\Metadata\Update;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_term')]
#[ApiResource]
#[GetCollection(normalizationContext: ['groups' => 'sylius:shop:term:index'])]
#[AsResource(
    section: 'admin',
    templatesDir: '@SyliusAdmin/shared/crud',
    routePrefix: '/admin',
    operations: [
        new BulkDelete(),
        new Create(),
        new Delete(),
        new Index(grid: TermGrid::class),
        new Update(),
    ]
)]
final class Term implements TermInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer', nullable: true)]
    protected ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['sylius:shop:term:index'])]
    protected ?string $code = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['sylius:shop:term:index'])]
    protected ?string $body = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): void
    {
        $this->body = $body;
    }
}
