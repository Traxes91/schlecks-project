<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507215804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chocolate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, vegan TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ice (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, proportion INT NOT NULL, vegan TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, vegan TINYINT(1) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schlecks (id INT AUTO_INCREMENT NOT NULL, chocolate_id INT DEFAULT NULL, size_id INT NOT NULL, sprinkles_id INT DEFAULT NULL, INDEX IDX_4CAAE8BB94D3F813 (chocolate_id), INDEX IDX_4CAAE8BB498DA827 (size_id), INDEX IDX_4CAAE8BB56E12B18 (sprinkles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schlecks_ingredient (schlecks_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_5FC3E39AFEEE79F (schlecks_id), INDEX IDX_5FC3E39A933FE08C (ingredient_id), PRIMARY KEY(schlecks_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schlecks_ice (schlecks_id INT NOT NULL, ice_id INT NOT NULL, INDEX IDX_C0248CAFFEEE79F (schlecks_id), INDEX IDX_C0248CAFD553E9BF (ice_id), PRIMARY KEY(schlecks_id, ice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sprinkles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, vegan TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schlecks ADD CONSTRAINT FK_4CAAE8BB94D3F813 FOREIGN KEY (chocolate_id) REFERENCES chocolate (id)');
        $this->addSql('ALTER TABLE schlecks ADD CONSTRAINT FK_4CAAE8BB498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE schlecks ADD CONSTRAINT FK_4CAAE8BB56E12B18 FOREIGN KEY (sprinkles_id) REFERENCES sprinkles (id)');
        $this->addSql('ALTER TABLE schlecks_ingredient ADD CONSTRAINT FK_5FC3E39AFEEE79F FOREIGN KEY (schlecks_id) REFERENCES schlecks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE schlecks_ingredient ADD CONSTRAINT FK_5FC3E39A933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE schlecks_ice ADD CONSTRAINT FK_C0248CAFFEEE79F FOREIGN KEY (schlecks_id) REFERENCES schlecks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE schlecks_ice ADD CONSTRAINT FK_C0248CAFD553E9BF FOREIGN KEY (ice_id) REFERENCES ice (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schlecks DROP FOREIGN KEY FK_4CAAE8BB94D3F813');
        $this->addSql('ALTER TABLE schlecks_ice DROP FOREIGN KEY FK_C0248CAFD553E9BF');
        $this->addSql('ALTER TABLE schlecks_ingredient DROP FOREIGN KEY FK_5FC3E39A933FE08C');
        $this->addSql('ALTER TABLE schlecks_ingredient DROP FOREIGN KEY FK_5FC3E39AFEEE79F');
        $this->addSql('ALTER TABLE schlecks_ice DROP FOREIGN KEY FK_C0248CAFFEEE79F');
        $this->addSql('ALTER TABLE schlecks DROP FOREIGN KEY FK_4CAAE8BB498DA827');
        $this->addSql('ALTER TABLE schlecks DROP FOREIGN KEY FK_4CAAE8BB56E12B18');
        $this->addSql('DROP TABLE chocolate');
        $this->addSql('DROP TABLE ice');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE schlecks');
        $this->addSql('DROP TABLE schlecks_ingredient');
        $this->addSql('DROP TABLE schlecks_ice');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE sprinkles');
    }
}
