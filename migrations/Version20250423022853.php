<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250423022853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds is_on_sale column to sylius_product table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE sylius_product ADD is_on_sale TINYINT(1) DEFAULT 0 NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE sylius_product DROP is_on_sale
        SQL);
    }
}
