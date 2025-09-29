<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250923065033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat ADD macategorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207FED9A42C FOREIGN KEY (macategorie_id) REFERENCES categorie_plat (id)');
        $this->addSql('CREATE INDEX IDX_2038A207FED9A42C ON plat (macategorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207FED9A42C');
        $this->addSql('DROP INDEX IDX_2038A207FED9A42C ON plat');
        $this->addSql('ALTER TABLE plat DROP macategorie_id');
    }
}
