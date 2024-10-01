<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240929105021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE books (
            id INT AUTO_INCREMENT NOT NULL,
            title VARCHAR(255) NOT NULL,
            publisher_id INT DEFAULT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_publisher FOREIGN KEY (publisher_id) REFERENCES publishers(id) ON DELETE CASCADE
        )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE books');
    }
}
