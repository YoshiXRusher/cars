<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031161641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carsoption (id INT AUTO_INCREMENT NOT NULL, id_desc_id INT NOT NULL, id_option_id INT NOT NULL, INDEX IDX_4AF3BFAA6AD05EC1 (id_desc_id), INDEX IDX_4AF3BFAA27F1A148 (id_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carsoption ADD CONSTRAINT FK_4AF3BFAA6AD05EC1 FOREIGN KEY (id_desc_id) REFERENCES description (id)');
        $this->addSql('ALTER TABLE carsoption ADD CONSTRAINT FK_4AF3BFAA27F1A148 FOREIGN KEY (id_option_id) REFERENCES `option` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carsoption DROP FOREIGN KEY FK_4AF3BFAA6AD05EC1');
        $this->addSql('ALTER TABLE carsoption DROP FOREIGN KEY FK_4AF3BFAA27F1A148');
        $this->addSql('DROP TABLE carsoption');
    }
}
