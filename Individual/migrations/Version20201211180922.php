<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211180922 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rick_pick (id INT AUTO_INCREMENT NOT NULL, tara_prod_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, descriere VARCHAR(100) NOT NULL, pret INT NOT NULL, INDEX IDX_2D5F651164C5F43F (tara_prod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tara_prod (id INT AUTO_INCREMENT NOT NULL, tara VARCHAR(255) NOT NULL, cantitate INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rick_pick ADD CONSTRAINT FK_2D5F651164C5F43F FOREIGN KEY (tara_prod_id) REFERENCES tara_prod (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rick_pick DROP FOREIGN KEY FK_2D5F651164C5F43F');
        $this->addSql('DROP TABLE rick_pick');
        $this->addSql('DROP TABLE tara_prod');
    }
}
