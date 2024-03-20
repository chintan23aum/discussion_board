<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320110711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE thread_posts (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, user_id INT DEFAULT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_82D9A5C1E2904019 (thread_id), INDEX IDX_82D9A5C1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE thread_posts ADD CONSTRAINT FK_82D9A5C1E2904019 FOREIGN KEY (thread_id) REFERENCES thread (id)');
        $this->addSql('ALTER TABLE thread_posts ADD CONSTRAINT FK_82D9A5C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE thread_messages DROP FOREIGN KEY FK_D4B35D4AA76ED395');
        $this->addSql('ALTER TABLE thread_messages DROP FOREIGN KEY FK_D4B35D4AE2904019');
        $this->addSql('DROP TABLE thread_messages');
        $this->addSql('ALTER TABLE thread ADD message LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE thread_messages (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, user_id INT DEFAULT NULL, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D4B35D4AE2904019 (thread_id), INDEX IDX_D4B35D4AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE thread_messages ADD CONSTRAINT FK_D4B35D4AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE thread_messages ADD CONSTRAINT FK_D4B35D4AE2904019 FOREIGN KEY (thread_id) REFERENCES thread (id)');
        $this->addSql('ALTER TABLE thread_posts DROP FOREIGN KEY FK_82D9A5C1E2904019');
        $this->addSql('ALTER TABLE thread_posts DROP FOREIGN KEY FK_82D9A5C1A76ED395');
        $this->addSql('DROP TABLE thread_posts');
        $this->addSql('ALTER TABLE thread DROP message');
    }
}
