<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419131751 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE order_drop_shipping (id INTEGER NOT NULL, "order" INTEGER DEFAULT NULL, provider_id INTEGER DEFAULT NULL, date_sync DATE DEFAULT NULL, state_order VARCHAR(100) NOT NULL, expected_delivery_date_min DATE DEFAULT NULL, expected_delivery_date DATE DEFAULT NULL, date_delivery_planned_min DATE DEFAULT NULL, date_delivery_planned DATE DEFAULT NULL, article_id INTEGER DEFAULT NULL, order_provider INTEGER DEFAULT NULL, agency_sent VARCHAR(100) NOT NULL, email_order_sent BOOLEAN DEFAULT NULL, tag VARCHAR(100) NOT NULL, warehouse INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE provider (id INTEGER NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE order_drop_shipping');
        $this->addSql('DROP TABLE provider');
    }
}
