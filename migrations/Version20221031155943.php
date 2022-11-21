<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031155943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, id_description_id INT NOT NULL, UNIQUE INDEX UNIQ_95C71D1430F92B6D (id_description_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, kilometrage INT NOT NULL, marque VARCHAR(100) NOT NULL, modele VARCHAR(100) NOT NULL, cylindree INT NOT NULL, puissance INT NOT NULL, nb_proprio SMALLINT NOT NULL, carburant VARCHAR(15) NOT NULL, transmition VARCHAR(15) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, id_cars_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A599F5C76 (id_cars_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1430F92B6D FOREIGN KEY (id_description_id) REFERENCES description (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A599F5C76 FOREIGN KEY (id_cars_id) REFERENCES cars (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1430F92B6D');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A599F5C76');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
