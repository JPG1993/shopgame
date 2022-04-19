<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419132745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes ADD fknjeux_id INT NOT NULL, ADD fkuser_id INT NOT NULL, ADD fkprix_id INT NOT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C5562C71D FOREIGN KEY (fknjeux_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C4DDAADE1 FOREIGN KEY (fkprix_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C5562C71D ON commandes (fknjeux_id)');
        $this->addSql('CREATE INDEX IDX_35D4282C7EF35C86 ON commandes (fkuser_id)');
        $this->addSql('CREATE INDEX IDX_35D4282C4DDAADE1 ON commandes (fkprix_id)');
        $this->addSql('ALTER TABLE comments ADD fknjeu_id INT NOT NULL, ADD fkuser_id INT NOT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA224FF58 FOREIGN KEY (fknjeu_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AA224FF58 ON comments (fknjeu_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A7EF35C86 ON comments (fkuser_id)');
        $this->addSql('ALTER TABLE message ADD fksujet_id INT NOT NULL, ADD fkuser_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF82A952F FOREIGN KEY (fksujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7EF35C86 FOREIGN KEY (fkuser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FF82A952F ON message (fksujet_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F7EF35C86 ON message (fkuser_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C5562C71D');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C7EF35C86');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C4DDAADE1');
        $this->addSql('DROP INDEX IDX_35D4282C5562C71D ON commandes');
        $this->addSql('DROP INDEX IDX_35D4282C7EF35C86 ON commandes');
        $this->addSql('DROP INDEX IDX_35D4282C4DDAADE1 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP fknjeux_id, DROP fkuser_id, DROP fkprix_id');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA224FF58');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A7EF35C86');
        $this->addSql('DROP INDEX IDX_5F9E962AA224FF58 ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962A7EF35C86 ON comments');
        $this->addSql('ALTER TABLE comments DROP fknjeu_id, DROP fkuser_id');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF82A952F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7EF35C86');
        $this->addSql('DROP INDEX IDX_B6BD307FF82A952F ON message');
        $this->addSql('DROP INDEX IDX_B6BD307F7EF35C86 ON message');
        $this->addSql('ALTER TABLE message DROP fksujet_id, DROP fkuser_id');
    }
}
