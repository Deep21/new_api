<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816210832 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inv_cart_product (id_cart INT UNSIGNED NOT NULL, id_product INT UNSIGNED NOT NULL, id_address_delivery INT UNSIGNED NOT NULL, id_product_attribute INT UNSIGNED NOT NULL, id_customization INT UNSIGNED NOT NULL, id_shop INT UNSIGNED DEFAULT 1 NOT NULL, quantity INT UNSIGNED NOT NULL, date_add DATETIME NOT NULL, INDEX id_product_attribute (id_product_attribute), INDEX id_cart_order (id_cart, date_add, id_product, id_product_attribute), PRIMARY KEY(id_cart, id_product, id_address_delivery, id_product_attribute, id_customization)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE inv_address');
        $this->addSql('ALTER TABLE inv_cart CHANGE recyclable recyclable TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE gift gift TINYINT(1) NOT NULL, CHANGE mobile_theme mobile_theme TINYINT(1) NOT NULL, CHANGE allow_seperated_package allow_seperated_package TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inv_address (id INT UNSIGNED AUTO_INCREMENT NOT NULL, id_country INT UNSIGNED NOT NULL, id_state INT UNSIGNED DEFAULT NULL, id_customer INT UNSIGNED DEFAULT 0 NOT NULL, id_manufacturer INT UNSIGNED DEFAULT 0 NOT NULL, id_supplier INT UNSIGNED DEFAULT 0 NOT NULL, id_warehouse INT UNSIGNED DEFAULT 0 NOT NULL, alias VARCHAR(32) NOT NULL COLLATE utf8_general_ci, company VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, lastname VARCHAR(255) NOT NULL COLLATE utf8_general_ci, firstname VARCHAR(255) NOT NULL COLLATE utf8_general_ci, address1 VARCHAR(128) NOT NULL COLLATE utf8_general_ci, address2 VARCHAR(128) DEFAULT NULL COLLATE utf8_general_ci, postcode VARCHAR(12) DEFAULT NULL COLLATE utf8_general_ci, city VARCHAR(64) NOT NULL COLLATE utf8_general_ci, other TEXT DEFAULT NULL COLLATE utf8_general_ci, phone VARCHAR(32) DEFAULT NULL COLLATE utf8_general_ci, phone_mobile VARCHAR(32) DEFAULT NULL COLLATE utf8_general_ci, vat_number VARCHAR(32) DEFAULT NULL COLLATE utf8_general_ci, dni VARCHAR(16) DEFAULT NULL COLLATE utf8_general_ci, date_add DATETIME NOT NULL, date_upd DATETIME NOT NULL, active TINYINT(1) DEFAULT \'1\' NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX id_country (id_country), INDEX id_state (id_state), INDEX id_customer (id_customer), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE inv_cart_product');
        $this->addSql('ALTER TABLE inv_cart CHANGE recyclable recyclable TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE gift gift TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE mobile_theme mobile_theme TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE allow_seperated_package allow_seperated_package TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
