<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421115017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes ADD fkuser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C7EF35C86 ON commandes (fkuser_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C7EF35C86');
        $this->addSql('DROP INDEX IDX_35D4282C7EF35C86 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP fkuser_id');
    }
}
