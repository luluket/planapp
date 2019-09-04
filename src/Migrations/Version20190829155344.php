<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190829155344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE godina ADD kalendarska_godina INT NOT NULL, DROP akademska_godina');
        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE godina ADD akademska_godina VARCHAR(9) NOT NULL COLLATE utf8mb4_unicode_ci, DROP kalendarska_godina');
        $this->addSql('ALTER TABLE plan_nabave CHANGE cpv_id cpv_id INT DEFAULT NULL, CHANGE godina_id godina_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
    }
}
