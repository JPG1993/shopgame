<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421111921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C7EF35C86');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A7EF35C86');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7EF35C86');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_35D4282C7EF35C86 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP fkuser_id');
        $this->addSql('DROP INDEX IDX_5F9E962A7EF35C86 ON comments');
        $this->addSql('ALTER TABLE comments DROP fkuser_id');
        $this->addSql('DROP INDEX IDX_B6BD307F7EF35C86 ON message');
        $this->addSql('ALTER TABLE message DROP fkuser_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, surname VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, mail VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, mdp VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE commandes ADD fkuser_id INT NOT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C7EF35C86 ON commandes (fkuser_id)');
        $this->addSql('ALTER TABLE comments ADD fkuser_id INT NOT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A7EF35C86 ON comments (fkuser_id)');
        $this->addSql('ALTER TABLE message ADD fkuser_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F7EF35C86 ON message (fkuser_id)');
    }
}
