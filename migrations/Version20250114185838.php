<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114185838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) DEFAULT NULL, birthdaydate DATE NOT NULL, placeofbirth VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, fathername VARCHAR(255) DEFAULT NULL, mothername VARCHAR(255) DEFAULT NULL, cin VARCHAR(255) NOT NULL, dateofissue VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, cnapsnumber VARCHAR(255) DEFAULT NULL, osie VARCHAR(255) DEFAULT NULL, companyposition VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, dateofhire VARCHAR(255) NOT NULL, basesalary VARCHAR(255) NOT NULL, typeofpayment VARCHAR(255) NOT NULL, bankaccountnumber VARCHAR(255) DEFAULT NULL, accountname VARCHAR(255) DEFAULT NULL, bankname VARCHAR(255) DEFAULT NULL, bankadress VARCHAR(255) DEFAULT NULL, rib VARCHAR(255) DEFAULT NULL, child INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE employee');
    }
}
