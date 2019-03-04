<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190304183347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attrubute_value (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_5AA3ED8E4584665A (product_id), INDEX IDX_5AA3ED8EB6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attrubute_value ADD CONSTRAINT FK_5AA3ED8E4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE attrubute_value ADD CONSTRAINT FK_5AA3ED8EB6E62EFA FOREIGN KEY (attribute_id) REFERENCES attributes (id)');
        $this->addSql('ALTER TABLE order_items CHANGE quantity quantity INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE cost cost INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE attrubute_value');
        $this->addSql('ALTER TABLE order_items CHANGE quantity quantity INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE cost cost INT NOT NULL');
    }
}
