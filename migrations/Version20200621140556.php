<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200621140556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE support_game (support_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_FB3DA7DF315B405 (support_id), INDEX IDX_FB3DA7DFE48FD905 (game_id), PRIMARY KEY(support_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE support_game ADD CONSTRAINT FK_FB3DA7DF315B405 FOREIGN KEY (support_id) REFERENCES support (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_game ADD CONSTRAINT FK_FB3DA7DFE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support DROP FOREIGN KEY FK_8004EBA597FFC673');
        $this->addSql('DROP INDEX IDX_8004EBA597FFC673 ON support');
        $this->addSql('ALTER TABLE support DROP games_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE support_game');
        $this->addSql('ALTER TABLE support ADD games_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA597FFC673 FOREIGN KEY (games_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_8004EBA597FFC673 ON support (games_id)');
    }
}
