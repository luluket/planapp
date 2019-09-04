<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190827204333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dekan20152016');
        $this->addSql('DROP TABLE dekan20162017');
        $this->addSql('DROP TABLE dekan20172018');
        $this->addSql('DROP TABLE dekan20182019');
        $this->addSql('DROP TABLE prodekan20152016');
        $this->addSql('DROP TABLE prodekan20162017');
        $this->addSql('DROP TABLE prodekan20172018');
        $this->addSql('DROP TABLE prodekan20182019');
        $this->addSql('DROP TABLE tajnica20152016');
        $this->addSql('DROP TABLE tajnica20162017');
        $this->addSql('DROP TABLE tajnica20172018');
        $this->addSql('DROP TABLE tajnica20182019');
        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dekan20152016 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dekan20162017 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dekan20172018 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dekan20182019 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prodekan20152016 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prodekan20162017 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prodekan20172018 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prodekan20182019 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tajnica20152016 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tajnica20162017 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tajnica20172018 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tajnica20182019 (id INT AUTO_INCREMENT NOT NULL, evidencijski_broj_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, predmet_nabave VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, cpv VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, procijenjena_vrijednost INT NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, posebni_rezim_nabave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, podijeljen_na_grupe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ugovorni_okvirni_sporazum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirani_pocetak VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, planirano_trajanje_ugovora VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
    }
}
