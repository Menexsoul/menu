<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251006151513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF04D9A99DF');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF09E2FF078');
        $this->addSql('DROP INDEX IDX_8F91ABF09E2FF078 ON avis');
        $this->addSql('DROP INDEX IDX_8F91ABF04D9A99DF ON avis');
        $this->addSql('ALTER TABLE avis ADD mes_avis_id INT DEFAULT NULL, ADD les_avis_id INT DEFAULT NULL, DROP pers_avis_id, DROP plat_avis_id');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0633147C FOREIGN KEY (mes_avis_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0C7BDCBBC FOREIGN KEY (les_avis_id) REFERENCES plat (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0633147C ON avis (mes_avis_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0C7BDCBBC ON avis (les_avis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0633147C');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0C7BDCBBC');
        $this->addSql('DROP INDEX IDX_8F91ABF0633147C ON avis');
        $this->addSql('DROP INDEX IDX_8F91ABF0C7BDCBBC ON avis');
        $this->addSql('ALTER TABLE avis ADD pers_avis_id INT DEFAULT NULL, ADD plat_avis_id INT DEFAULT NULL, DROP mes_avis_id, DROP les_avis_id');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF04D9A99DF FOREIGN KEY (pers_avis_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF09E2FF078 FOREIGN KEY (plat_avis_id) REFERENCES plat (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF09E2FF078 ON avis (plat_avis_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF04D9A99DF ON avis (pers_avis_id)');
    }
}
