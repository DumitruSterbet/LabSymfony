<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201212150652 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prod_desc DROP FOREIGN KEY FK_2D5F651164C5F43F');
        $this->addSql('DROP INDEX idx_2d5f651164c5f43f ON prod_desc');
        $this->addSql('CREATE INDEX IDX_86F61B8464C5F43F ON prod_desc (tara_prod_id)');
        $this->addSql('ALTER TABLE prod_desc ADD CONSTRAINT FK_2D5F651164C5F43F FOREIGN KEY (tara_prod_id) REFERENCES tara_prod (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prod_desc DROP FOREIGN KEY FK_86F61B8464C5F43F');
        $this->addSql('DROP INDEX idx_86f61b8464c5f43f ON prod_desc');
        $this->addSql('CREATE INDEX IDX_2D5F651164C5F43F ON prod_desc (tara_prod_id)');
        $this->addSql('ALTER TABLE prod_desc ADD CONSTRAINT FK_86F61B8464C5F43F FOREIGN KEY (tara_prod_id) REFERENCES tara_prod (id)');
    }
}
