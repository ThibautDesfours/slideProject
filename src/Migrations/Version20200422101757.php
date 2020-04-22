<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200422101757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture CHANGE create_at create_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE picture_effect ADD slide_id INT DEFAULT NULL, CHANGE picture_id picture_id INT DEFAULT NULL, CHANGE length_effect length_effect DOUBLE PRECISION DEFAULT NULL, CHANGE start_effect start_effect VARCHAR(255) DEFAULT NULL, CHANGE end_effect end_effect VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture_effect ADD CONSTRAINT FK_278427E2DD5AFB87 FOREIGN KEY (slide_id) REFERENCES slide (id)');
        $this->addSql('CREATE INDEX IDX_278427E2DD5AFB87 ON picture_effect (slide_id)');
        $this->addSql('ALTER TABLE slide DROP FOREIGN KEY FK_72EFEE627A5FFDBE');
        $this->addSql('DROP INDEX IDX_72EFEE627A5FFDBE ON slide');
        $this->addSql('ALTER TABLE slide DROP picture_effects_id, CHANGE title_slide title_slide VARCHAR(255) DEFAULT NULL, CHANGE create_at create_at DATETIME DEFAULT NULL, CHANGE removed_at removed_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture CHANGE create_at create_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE picture_effect DROP FOREIGN KEY FK_278427E2DD5AFB87');
        $this->addSql('DROP INDEX IDX_278427E2DD5AFB87 ON picture_effect');
        $this->addSql('ALTER TABLE picture_effect DROP slide_id, CHANGE picture_id picture_id INT DEFAULT NULL, CHANGE length_effect length_effect DOUBLE PRECISION DEFAULT \'NULL\', CHANGE start_effect start_effect VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE end_effect end_effect VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE slide ADD picture_effects_id INT DEFAULT NULL, CHANGE title_slide title_slide VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE create_at create_at DATETIME DEFAULT \'NULL\', CHANGE removed_at removed_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE slide ADD CONSTRAINT FK_72EFEE627A5FFDBE FOREIGN KEY (picture_effects_id) REFERENCES picture_effect (id)');
        $this->addSql('CREATE INDEX IDX_72EFEE627A5FFDBE ON slide (picture_effects_id)');
    }
}
