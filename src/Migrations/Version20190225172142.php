<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190225172142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD address VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE order_items CHANGE quantity quantity INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE cost cost INT NOT NULL');
        $this->addSql('ALTER TABLE orders ADD first_nam VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD address VARCHAR(500) DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_items CHANGE quantity quantity INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE cost cost INT NOT NULL');
        $this->addSql('ALTER TABLE orders DROP first_nam, DROP last_name, DROP phone, DROP address, DROP email');
        $this->addSql('ALTER TABLE users DROP first_name, DROP last_name, DROP phone, DROP address');
    }
}
