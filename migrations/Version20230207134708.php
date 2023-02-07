<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207134708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE escale (id INT AUTO_INCREMENT NOT NULL, navire_id INT NOT NULL, port_id INT NOT NULL, dateHeureArrive DATETIME NOT NULL, dateHeureDepart DATETIME DEFAULT NULL, INDEX IDX_C39FEDD3D840FD82 (navire_id), INDEX IDX_C39FEDD376E92A9C (port_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3D840FD82 FOREIGN KEY (navire_id) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD376E92A9C FOREIGN KEY (port_id) REFERENCES port (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3D840FD82');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD376E92A9C');
        $this->addSql('DROP TABLE escale');
    }
}
