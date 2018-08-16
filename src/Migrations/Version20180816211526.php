<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816211526 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inv_cart_product (id_cart INT UNSIGNED NOT NULL, id_product INT UNSIGNED NOT NULL, id_address_delivery INT UNSIGNED NOT NULL, id_product_attribute INT UNSIGNED NOT NULL, id_customization INT UNSIGNED NOT NULL, id_shop INT UNSIGNED DEFAULT 1 NOT NULL, quantity INT UNSIGNED NOT NULL, date_add DATETIME NOT NULL, INDEX id_product_attribute (id_product_attribute), INDEX id_cart_order (id_cart, date_add, id_product, id_product_attribute), PRIMARY KEY(id_cart, id_product, id_address_delivery, id_product_attribute, id_customization)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inv_cart CHANGE recyclable recyclable TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE gift gift TINYINT(1) NOT NULL, CHANGE mobile_theme mobile_theme TINYINT(1) NOT NULL, CHANGE allow_seperated_package allow_seperated_package TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE inv_address CHANGE id_customer id_customer INT UNSIGNED NOT NULL, CHANGE id_manufacturer id_manufacturer INT UNSIGNED NOT NULL, CHANGE id_supplier id_supplier INT UNSIGNED NOT NULL, CHANGE id_warehouse id_warehouse INT UNSIGNED NOT NULL, CHANGE active active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE deleted deleted TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE inv_cart_product');
        $this->addSql('ALTER TABLE inv_address CHANGE id_customer id_customer INT UNSIGNED DEFAULT 0 NOT NULL, CHANGE id_manufacturer id_manufacturer INT UNSIGNED DEFAULT 0 NOT NULL, CHANGE id_supplier id_supplier INT UNSIGNED DEFAULT 0 NOT NULL, CHANGE id_warehouse id_warehouse INT UNSIGNED DEFAULT 0 NOT NULL, CHANGE active active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE deleted deleted TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE inv_cart CHANGE recyclable recyclable TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE gift gift TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE mobile_theme mobile_theme TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE allow_seperated_package allow_seperated_package TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
