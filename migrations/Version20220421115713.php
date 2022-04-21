<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421115713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments ADD fkuser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A7EF35C86 ON comments (fkuser_id)');
        $this->addSql('ALTER TABLE message ADD fkuser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F7EF35C86 ON message (fkuser_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A7EF35C86');
        $this->addSql('DROP INDEX IDX_5F9E962A7EF35C86 ON comments');
        $this->addSql('ALTER TABLE comments DROP fkuser_id');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7EF35C86');
        $this->addSql('DROP INDEX IDX_B6BD307F7EF35C86 ON message');
        $this->addSql('ALTER TABLE message DROP fkuser_id');
    }
}
