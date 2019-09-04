<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190816135723 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE plan_nabave20112012 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL, predmet_nabave VARCHAR(200) NOT NULL, cpv VARCHAR(255) NOT NULL, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL, posebni_rezim_nabave VARCHAR(255) NOT NULL, podijeljen_na_grupe VARCHAR(255) NOT NULL, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL, planirani_pocetak VARCHAR(255) NOT NULL, planirano_trajanje_ugovora VARCHAR(255) NOT NULL, napomena VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE plan_nabave20112012');
    }
}
