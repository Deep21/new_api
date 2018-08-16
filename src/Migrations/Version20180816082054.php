<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816082054 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inv_cart (id_cart INT UNSIGNED AUTO_INCREMENT NOT NULL, id_shop_group INT UNSIGNED DEFAULT 1 NOT NULL, id_shop INT UNSIGNED DEFAULT 1 NOT NULL, id_carrier INT UNSIGNED NOT NULL, delivery_option TEXT NOT NULL, id_lang INT UNSIGNED NOT NULL, id_address_delivery INT UNSIGNED NOT NULL, id_address_invoice INT UNSIGNED NOT NULL, id_currency INT UNSIGNED NOT NULL, id_customer INT UNSIGNED NOT NULL, id_guest INT UNSIGNED NOT NULL, secure_key VARCHAR(32) DEFAULT \'-1\' NOT NULL, recyclable TINYINT(1) DEFAULT \'1\' NOT NULL, gift TINYINT(1) NOT NULL, gift_message TEXT DEFAULT NULL, mobile_theme TINYINT(1) NOT NULL, allow_seperated_package TINYINT(1) NOT NULL, date_add DATETIME NOT NULL, date_upd DATETIME NOT NULL, checkout_session_data MEDIUMTEXT DEFAULT NULL, INDEX cart_customer (id_customer), INDEX id_address_delivery (id_address_delivery), INDEX id_address_invoice (id_address_invoice), INDEX id_carrier (id_carrier), INDEX id_lang (id_lang), INDEX id_currency (id_currency), INDEX id_guest (id_guest), INDEX id_shop_group (id_shop_group), INDEX id_shop_2 (id_shop, date_upd), INDEX id_shop (id_shop, date_add), PRIMARY KEY(id_cart)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inv_cart_product (id_cart INT UNSIGNED NOT NULL, id_product INT UNSIGNED NOT NULL, id_address_delivery INT UNSIGNED NOT NULL, id_product_attribute INT UNSIGNED NOT NULL, id_customization INT UNSIGNED NOT NULL, id_shop INT UNSIGNED DEFAULT 1 NOT NULL, quantity INT UNSIGNED NOT NULL, date_add DATETIME NOT NULL, INDEX id_product_attribute (id_product_attribute), INDEX id_cart_order (id_cart, date_add, id_product, id_product_attribute), PRIMARY KEY(id_cart, id_product, id_address_delivery, id_product_attribute, id_customization)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inv_order (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(9) NOT NULL, id_customer INT NOT NULL, id_cart INT NOT NULL, id_currency INT NOT NULL, id_address_delivery INT NOT NULL, id_address_invoice INT NOT NULL, invoice_number INT NOT NULL, total_discounts NUMERIC(20, 0) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE inv_cart');
        $this->addSql('DROP TABLE inv_cart_product');
        $this->addSql('DROP TABLE inv_order');
    }
}
