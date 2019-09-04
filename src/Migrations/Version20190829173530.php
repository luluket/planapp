<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190829173530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE posebni_rezim_nabave posebni_rezim_nabave VARCHAR(255) DEFAULT NULL, CHANGE napomena napomena VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE posebni_rezim_nabave posebni_rezim_nabave VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE napomena napomena VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
