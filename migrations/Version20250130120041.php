<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130120041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, stock_id INT NOT NULL, action VARCHAR(255) NOT NULL, quantity DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_A45BDDC1A76ED395 (user_id), INDEX IDX_A45BDDC1DCD6110 (stock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE depositary CHANGE stock_id stock_id INT NOT NULL, CHANGE portfolio_id portfolio_id INT NOT NULL, CHANGE quantity quantity INT NOT NULL');
        $this->addSql('ALTER TABLE depositary ADD CONSTRAINT FK_7CD08B68DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE depositary ADD CONSTRAINT FK_7CD08B68B96B5643 FOREIGN KEY (portfolio_id) REFERENCES portfolio (id)');
        $this->addSql('CREATE INDEX IDX_7CD08B68DCD6110 ON depositary (stock_id)');
        $this->addSql('CREATE INDEX IDX_7CD08B68B96B5643 ON depositary (portfolio_id)');
        $this->addSql('ALTER TABLE stock CHANGE ticker ticker VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1A76ED395');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1DCD6110');
        $this->addSql('DROP TABLE application');
        $this->addSql('ALTER TABLE depositary DROP FOREIGN KEY FK_7CD08B68DCD6110');
        $this->addSql('ALTER TABLE depositary DROP FOREIGN KEY FK_7CD08B68B96B5643');
        $this->addSql('DROP INDEX IDX_7CD08B68DCD6110 ON depositary');
        $this->addSql('DROP INDEX IDX_7CD08B68B96B5643 ON depositary');
        $this->addSql('ALTER TABLE depositary CHANGE stock_id stock_id INT DEFAULT NULL, CHANGE portfolio_id portfolio_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock CHANGE ticker ticker VARCHAR(255) DEFAULT NULL');
    }
}
