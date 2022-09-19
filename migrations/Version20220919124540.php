<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220919124540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create customer entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE customer');
    }
}
