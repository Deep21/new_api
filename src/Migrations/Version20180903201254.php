<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180903201254 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customer ADD shopgroup_id INT DEFAULT NULL, ADD shop_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, ADD is_active TINYINT(1) NOT NULL, ADD is_deleted TINYINT(1) NOT NULL, ADD birthday DATETIME NOT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09892F7810 FOREIGN KEY (shopgroup_id) REFERENCES shop_group (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E094D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('CREATE INDEX IDX_81398E09892F7810 ON customer (shopgroup_id)');
        $this->addSql('CREATE INDEX IDX_81398E094D16C4DD ON customer (shop_id)');
        $this->addSql('ALTER TABLE `order` ADD shop_id INT DEFAULT NULL, ADD cart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993981AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('CREATE INDEX IDX_F52993984D16C4DD ON `order` (shop_id)');
        $this->addSql('CREATE INDEX IDX_F52993981AD5CDBF ON `order` (cart_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09892F7810');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E094D16C4DD');
        $this->addSql('DROP INDEX IDX_81398E09892F7810 ON customer');
        $this->addSql('DROP INDEX IDX_81398E094D16C4DD ON customer');
        $this->addSql('ALTER TABLE customer DROP shopgroup_id, DROP shop_id, DROP created_at, DROP updated_at, DROP is_active, DROP is_deleted, DROP birthday');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984D16C4DD');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993981AD5CDBF');
        $this->addSql('DROP INDEX IDX_F52993984D16C4DD ON `order`');
        $this->addSql('DROP INDEX IDX_F52993981AD5CDBF ON `order`');
        $this->addSql('ALTER TABLE `order` DROP shop_id, DROP cart_id');
    }
}
