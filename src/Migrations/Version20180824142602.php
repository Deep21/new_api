<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180824142602 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE manufacturer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, date_add DATETIME NOT NULL, date_upd DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, gift TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, is_active TINYINT(1) NOT NULL, is_deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, customer_id INT UNSIGNED DEFAULT NULL, reference VARCHAR(9) NOT NULL, INDEX IDX_F52993989395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tax (id INT UNSIGNED AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manufacturer_shop (id INT NOT NULL, id_shop INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, share_customer TINYINT(1) NOT NULL, share_order TINYINT(1) NOT NULL, share_stock TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, iso_code VARCHAR(3) NOT NULL, conversion_rate NUMERIC(13, 6) NOT NULL, deleted TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT UNSIGNED AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE address ADD manufacturer_id INT DEFAULT NULL, ADD address2 VARCHAR(128) DEFAULT NULL, ADD postcode VARCHAR(12) NOT NULL, ADD city VARCHAR(64) NOT NULL, ADD other VARCHAR(255) DEFAULT NULL, ADD phone VARCHAR(32) NOT NULL, ADD phone_mobile VARCHAR(32) NOT NULL, ADD vat_number VARCHAR(32) DEFAULT NULL, ADD dni VARCHAR(16) DEFAULT NULL, ADD deleted TINYINT(1) DEFAULT NULL, ADD date_add DATETIME NOT NULL, ADD date_upd DATETIME NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81A23B42D ON address (manufacturer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A23B42D');
        $this->addSql('DROP TABLE manufacturer');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE tax');
        $this->addSql('DROP TABLE manufacturer_shop');
        $this->addSql('DROP TABLE shop_group');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP INDEX IDX_D4E6F81A23B42D ON address');
        $this->addSql('ALTER TABLE address DROP manufacturer_id, DROP address2, DROP postcode, DROP city, DROP other, DROP phone, DROP phone_mobile, DROP vat_number, DROP dni, DROP deleted, DROP date_add, DROP date_upd');
    }
}
