<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419180318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY commande_ibfk_1');
        $this->addSql('ALTER TABLE commande CHANGE idlivreur idlivreur INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D347E1C03 FOREIGN KEY (idlivreur) REFERENCES livreur (id_livreur)');
        $this->addSql('ALTER TABLE commentaire CHANGE IdPatient IdPatient INT DEFAULT NULL, CHANGE idArticle idArticle INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE idPatient idPatient INT DEFAULT NULL, CHANGE idExpert idExpert INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE IdExpert IdExpert INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_1');
        $this->addSql('ALTER TABLE panier ADD nom VARCHAR(25) NOT NULL, ADD prix INT NOT NULL, ADD image VARCHAR(70) NOT NULL, ADD reference VARCHAR(30) NOT NULL, CHANGE idproduit idproduit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F6A1BE49 FOREIGN KEY (idproduit) REFERENCES produit (idproduit)');
        $this->addSql('ALTER TABLE produit CHANGE IdShopOwner IdShopOwner INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27E800FB99 FOREIGN KEY (IdShopOwner) REFERENCES shopowner (idOwner)');
        $this->addSql('CREATE INDEX IdShopOwner ON produit (IdShopOwner)');
        $this->addSql('ALTER TABLE reservation CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_event id_event INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D347E1C03');
        $this->addSql('ALTER TABLE commande CHANGE idlivreur idlivreur INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT commande_ibfk_1 FOREIGN KEY (idlivreur) REFERENCES livreur (id_livreur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire CHANGE idArticle idArticle INT NOT NULL, CHANGE IdPatient IdPatient INT NOT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE idExpert idExpert INT NOT NULL, CHANGE idPatient idPatient INT NOT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE IdExpert IdExpert INT NOT NULL');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F6A1BE49');
        $this->addSql('ALTER TABLE panier DROP nom, DROP prix, DROP image, DROP reference, CHANGE idproduit idproduit INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT panier_ibfk_1 FOREIGN KEY (idproduit) REFERENCES produit (idproduit) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27E800FB99');
        $this->addSql('DROP INDEX IdShopOwner ON produit');
        $this->addSql('ALTER TABLE produit CHANGE IdShopOwner IdShopOwner INT NOT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE id_event id_event INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
    }
}
