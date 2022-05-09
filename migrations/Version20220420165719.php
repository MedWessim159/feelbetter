<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420165719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE article article VARCHAR(500) DEFAULT \'\'\'non\'\'\' NOT NULL, CHANGE approuver approuver VARCHAR(255) DEFAULT \'\'\'Non\'\'\' NOT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D347E1C03');
        $this->addSql('DROP INDEX fk_6eeaa67d347e1c03 ON commande');
        $this->addSql('CREATE INDEX idlivreur ON commande (idlivreur)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D347E1C03 FOREIGN KEY (idlivreur) REFERENCES livreur (id_livreur)');
        $this->addSql('ALTER TABLE consultation CHANGE confirmation confirmation VARCHAR(5) DEFAULT \'\'\'NON\'\'\' NOT NULL');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F6A1BE49');
        $this->addSql('ALTER TABLE panier DROP quantite, DROP nbre_de_produit');
        $this->addSql('DROP INDEX fk_24cc0df2f6a1be49 ON panier');
        $this->addSql('CREATE INDEX idproduit ON panier (idproduit)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F6A1BE49 FOREIGN KEY (idproduit) REFERENCES produit (idproduit)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE article article VARCHAR(500) DEFAULT \'non\' NOT NULL, CHANGE approuver approuver VARCHAR(255) DEFAULT \'Non\' NOT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D347E1C03');
        $this->addSql('DROP INDEX idlivreur ON commande');
        $this->addSql('CREATE INDEX FK_6EEAA67D347E1C03 ON commande (idlivreur)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D347E1C03 FOREIGN KEY (idlivreur) REFERENCES livreur (id_livreur)');
        $this->addSql('ALTER TABLE consultation CHANGE confirmation confirmation VARCHAR(5) DEFAULT \'NON\' NOT NULL');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F6A1BE49');
        $this->addSql('ALTER TABLE panier ADD quantite INT NOT NULL, ADD nbre_de_produit INT NOT NULL');
        $this->addSql('DROP INDEX idproduit ON panier');
        $this->addSql('CREATE INDEX FK_24CC0DF2F6A1BE49 ON panier (idproduit)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F6A1BE49 FOREIGN KEY (idproduit) REFERENCES produit (idproduit)');
    }
}
