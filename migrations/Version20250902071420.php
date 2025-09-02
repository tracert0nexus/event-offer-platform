<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250902071420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_meta (id INT AUTO_INCREMENT NOT NULL, about JSON DEFAULT NULL, contact JSON NOT NULL, team JSON DEFAULT NULL, iban VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, quote_id INT NOT NULL, amount NUMERIC(12, 2) NOT NULL, due_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', paid_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_90651744DB805178 (quote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote (id INT AUTO_INCREMENT NOT NULL, quote_request_id INT NOT NULL, amount NUMERIC(12, 2) NOT NULL, text LONGTEXT DEFAULT NULL, valid_until DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(16) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_6B71CBF4F229C21E (quote_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote_request (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, budget NUMERIC(12, 2) NOT NULL, details LONGTEXT NOT NULL, status VARCHAR(32) NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reference (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, images JSON DEFAULT NULL, is_public TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744DB805178 FOREIGN KEY (quote_id) REFERENCES quote (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4F229C21E FOREIGN KEY (quote_request_id) REFERENCES quote_request (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744DB805178');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4F229C21E');
        $this->addSql('DROP TABLE company_meta');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE quote_request');
        $this->addSql('DROP TABLE reference');
        $this->addSql('DROP TABLE service');
    }
}
