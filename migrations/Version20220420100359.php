<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420100359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, fknjeux_id INT NOT NULL, fkuser_id INT NOT NULL, fkprix_id INT NOT NULL, INDEX IDX_35D4282C5562C71D (fknjeux_id), INDEX IDX_35D4282C7EF35C86 (fkuser_id), INDEX IDX_35D4282C4DDAADE1 (fkprix_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, fknjeu_id INT NOT NULL, fkuser_id INT NOT NULL, comment LONGTEXT NOT NULL, date DATE NOT NULL, avis INT NOT NULL, INDEX IDX_5F9E962AA224FF58 (fknjeu_id), INDEX IDX_5F9E962A7EF35C86 (fkuser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, date DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, fksujet_id INT NOT NULL, fkuser_id INT NOT NULL, message LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_B6BD307FF82A952F (fksujet_id), INDEX IDX_B6BD307F7EF35C86 (fkuser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujet (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C5562C71D FOREIGN KEY (fknjeux_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C4DDAADE1 FOREIGN KEY (fkprix_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA224FF58 FOREIGN KEY (fknjeu_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF82A952F FOREIGN KEY (fksujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C5562C71D');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C4DDAADE1');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA224FF58');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF82A952F');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C7EF35C86');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A7EF35C86');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7EF35C86');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE sujet');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
