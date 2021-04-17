<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200904015059 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_traitement DROP FOREIGN KEY FK_C999833ADB683B2A');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, document_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, age INT NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EBC33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, factrue_id INT NOT NULL, mode_paie VARCHAR(255) NOT NULL, INDEX IDX_B1DC7A1ED00802A0 (factrue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche (id INT AUTO_INCREMENT NOT NULL, facture_id INT NOT NULL, patient_id INT NOT NULL, num_trait INT NOT NULL, UNIQUE INDEX UNIQ_4C13CC787F2DEE08 (facture_id), INDEX IDX_4C13CC786B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne (id INT AUTO_INCREMENT NOT NULL, fiche_id INT NOT NULL, type_trait VARCHAR(255) NOT NULL, temp_traitement DATETIME NOT NULL, INDEX IDX_57F0DB83DF522508 (fiche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBC33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1ED00802A0 FOREIGN KEY (factrue_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC787F2DEE08 FOREIGN KEY (facture_id) REFERENCES fiche (id)');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC786B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE ligne ADD CONSTRAINT FK_57F0DB83DF522508 FOREIGN KEY (fiche_id) REFERENCES fiche (id)');
        $this->addSql('DROP TABLE fiche_traitement');
        $this->addSql('DROP TABLE ligne_traitement');
        $this->addSql('ALTER TABLE consultation ADD patient_id INT NOT NULL, ADD ordonnance_id INT NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A62BF23B8F FOREIGN KEY (ordonnance_id) REFERENCES ordonnance (id)');
        $this->addSql('CREATE INDEX IDX_964685A66B899279 ON consultation (patient_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_964685A62BF23B8F ON consultation (ordonnance_id)');
        $this->addSql('ALTER TABLE document ADD patient_id INT NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A766B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8698A766B899279 ON document (patient_id)');
        $this->addSql('ALTER TABLE facture ADD fiche_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410DF522508 FOREIGN KEY (fiche_id) REFERENCES fiche (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410DF522508 ON facture (fiche_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410DF522508');
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC787F2DEE08');
        $this->addSql('ALTER TABLE ligne DROP FOREIGN KEY FK_57F0DB83DF522508');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66B899279');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A766B899279');
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC786B899279');
        $this->addSql('CREATE TABLE fiche_traitement (id INT AUTO_INCREMENT NOT NULL, num_traitement INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ligne_traitement (id INT AUTO_INCREMENT NOT NULL, fichetraitement_id INT NOT NULL, type_traitement DATETIME NOT NULL, INDEX IDX_C999833ADB683B2A (fichetraitement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ligne_traitement ADD CONSTRAINT FK_C999833ADB683B2A FOREIGN KEY (fichetraitement_id) REFERENCES fiche_traitement (id)');
        $this->addSql('DROP TABLE fiche');
        $this->addSql('DROP TABLE ligne');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A62BF23B8F');
        $this->addSql('DROP INDEX IDX_964685A66B899279 ON consultation');
        $this->addSql('DROP INDEX UNIQ_964685A62BF23B8F ON consultation');
        $this->addSql('ALTER TABLE consultation DROP patient_id, DROP ordonnance_id');
        $this->addSql('DROP INDEX UNIQ_D8698A766B899279 ON document');
        $this->addSql('ALTER TABLE document DROP patient_id');
        $this->addSql('DROP INDEX UNIQ_FE866410DF522508 ON facture');
        $this->addSql('ALTER TABLE facture DROP fiche_id');
    }
}
