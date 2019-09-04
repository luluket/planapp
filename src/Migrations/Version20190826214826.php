<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190826214826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE godina (id INT AUTO_INCREMENT NOT NULL, akademska_godina VARCHAR(9) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_nabave (id INT AUTO_INCREMENT NOT NULL, cpv_id INT DEFAULT NULL, godina_id INT DEFAULT NULL, user_id INT DEFAULT NULL, evidencijski_broj VARCHAR(255) NOT NULL, predmet_nabave VARCHAR(255) NOT NULL, procijenjena_vrijednost NUMERIC(8, 2) NOT NULL, vrsta_postupka VARCHAR(255) NOT NULL, posebni_rezim_nabave VARCHAR(255) NOT NULL, podijeljen_na_grupe VARCHAR(255) NOT NULL, sporazum VARCHAR(255) NOT NULL, planirani_pocetak VARCHAR(255) NOT NULL, planirano_trajanje VARCHAR(255) NOT NULL, napomena VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_FB15C3E1124DFFA (cpv_id), INDEX IDX_FB15C3EBB5A39D8 (godina_id), INDEX IDX_FB15C3EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plan_nabave ADD CONSTRAINT FK_FB15C3E1124DFFA FOREIGN KEY (cpv_id) REFERENCES cpv (id)');
        $this->addSql('ALTER TABLE plan_nabave ADD CONSTRAINT FK_FB15C3EBB5A39D8 FOREIGN KEY (godina_id) REFERENCES godina (id)');
        $this->addSql('ALTER TABLE plan_nabave ADD CONSTRAINT FK_FB15C3EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan_nabave DROP FOREIGN KEY FK_FB15C3EBB5A39D8');
        $this->addSql('DROP TABLE godina');
        $this->addSql('DROP TABLE plan_nabave');
    }
}
