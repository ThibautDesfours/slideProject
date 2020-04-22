<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200422100738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture ADD path_picture VARCHAR(255) NOT NULL, DROP removed_at, DROP path_picutre, CHANGE create_at create_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE picture_effect CHANGE picture_id picture_id INT DEFAULT NULL, CHANGE length_effect length_effect DOUBLE PRECISION DEFAULT NULL, CHANGE start_effect start_effect VARCHAR(255) DEFAULT NULL, CHANGE end_effect end_effect VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE slide CHANGE picture_effects_id picture_effects_id INT DEFAULT NULL, CHANGE title_slide title_slide VARCHAR(255) DEFAULT NULL, CHANGE create_at create_at DATETIME DEFAULT NULL, CHANGE removed_at removed_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture ADD removed_at DATETIME DEFAULT \'NULL\', ADD path_picutre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, DROP path_picture, CHANGE create_at create_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE picture_effect CHANGE picture_id picture_id INT DEFAULT NULL, CHANGE length_effect length_effect DOUBLE PRECISION DEFAULT \'NULL\', CHANGE start_effect start_effect VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE end_effect end_effect VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE slide CHANGE picture_effects_id picture_effects_id INT DEFAULT NULL, CHANGE title_slide title_slide VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE create_at create_at DATETIME DEFAULT \'NULL\', CHANGE removed_at removed_at DATETIME DEFAULT \'NULL\'');
    }
}
