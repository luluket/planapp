<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830110255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article');
        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE posebni_rezim_nabave posebni_rezim_nabave VARCHAR(255) DEFAULT NULL, CHANGE napomena napomena VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title TINYTEXT NOT NULL COLLATE utf8mb4_unicode_ci, body LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, numbers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE posebni_rezim_nabave posebni_rezim_nabave VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE napomena napomena VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
