<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190130171857 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY order_item_orders_id_fk');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created DATETIME NOT NULL, state VARCHAR(255) NOT NULL, state_pay TINYINT(1) DEFAULT \'0\' NOT NULL, users VARCHAR(255) NOT NULL, summ INT NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP INDEX order_item_orders_id_fk ON order_item');
        $this->addSql('ALTER TABLE order_item DROP order_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, state VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, state_pay TINYINT(1) NOT NULL, users VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, summ INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('ALTER TABLE order_item ADD order_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT order_item_orders_id_fk FOREIGN KEY (order_id) REFERENCES orders (id)');
        $this->addSql('CREATE INDEX order_item_orders_id_fk ON order_item (order_id)');
    }
}
