<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207132950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aisshiptype (id INT AUTO_INCREMENT NOT NULL, aisshiptype INT NOT NULL, libelle VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, date_message DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navire (id INT AUTO_INCREMENT NOT NULL, idaishiptype INT NOT NULL, idpays INT NOT NULL, imo VARCHAR(7) NOT NULL, nom VARCHAR(255) NOT NULL, mmsi VARCHAR(9) NOT NULL, indicatifAppel VARCHAR(10) NOT NULL, eta DATETIME DEFAULT NULL, longueur INT NOT NULL, largeur INT NOT NULL, tirantdeau DOUBLE PRECISION NOT NULL, INDEX IDX_EED10381F38F64 (idaishiptype), INDEX IDX_EED1038E750CD0E (idpays), INDEX ind_IMO (imo), INDEX ind_MMSI (mmsi), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, indicatif VARCHAR(3) NOT NULL, INDEX ind_indicatif (indicatif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, indicatif VARCHAR(5) NOT NULL, INDEX ind_INDICATIF (indicatif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE porttypecompatible (idport INT NOT NULL, idaisshiptype INT NOT NULL, INDEX IDX_2C02FFDB905EAC6C (idport), INDEX IDX_2C02FFDB39F5FA88 (idaisshiptype), PRIMARY KEY(idport, idaisshiptype)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED10381F38F64 FOREIGN KEY (idaishiptype) REFERENCES aisshiptype (id)');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038E750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB39F5FA88 FOREIGN KEY (idaisshiptype) REFERENCES aisshiptype (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED10381F38F64');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038E750CD0E');
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB905EAC6C');
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB39F5FA88');
        $this->addSql('DROP TABLE aisshiptype');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE navire');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE port');
        $this->addSql('DROP TABLE porttypecompatible');
    }
}
