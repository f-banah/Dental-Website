<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200905225200 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBC33F7837');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EBC33F7837 ON patient');
        $this->addSql('ALTER TABLE patient CHANGE document_id document INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient CHANGE document document_id INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBC33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBC33F7837 ON patient (document_id)');
    }
}
