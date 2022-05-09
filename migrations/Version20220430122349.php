<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220430122349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE article article VARCHAR(500) DEFAULT \'\'\'non\'\'\' NOT NULL, CHANGE approuver approuver VARCHAR(255) DEFAULT \'\'\'Non\'\'\' NOT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE confirmation confirmation VARCHAR(5) DEFAULT \'\'\'NON\'\'\' NOT NULL');
        $this->addSql('ALTER TABLE messagerie ADD id_env INT NOT NULL, ADD id_rec INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE article article VARCHAR(500) DEFAULT \'non\' NOT NULL, CHANGE approuver approuver VARCHAR(255) DEFAULT \'Non\' NOT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE confirmation confirmation VARCHAR(5) DEFAULT \'NON\' NOT NULL');
        $this->addSql('ALTER TABLE messagerie DROP id_env, DROP id_rec');
    }
}
