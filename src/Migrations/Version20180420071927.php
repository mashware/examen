<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180420071927 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__order_drop_shipping AS SELECT id, "order", provider_id, date_sync, state_order, expected_delivery_date_min, expected_delivery_date, date_delivery_planned_min, date_delivery_planned, article_id, order_provider, agency_sent, email_order_sent, tag, warehouse FROM order_drop_shipping');
        $this->addSql('DROP TABLE order_drop_shipping');
        $this->addSql('CREATE TABLE order_drop_shipping (id INTEGER NOT NULL, provider_id INTEGER DEFAULT NULL, date_sync DATE DEFAULT NULL, state_order VARCHAR(100) NOT NULL COLLATE BINARY, expected_delivery_date_min DATE DEFAULT NULL, expected_delivery_date DATE DEFAULT NULL, date_delivery_planned_min DATE DEFAULT NULL, date_delivery_planned DATE DEFAULT NULL, article_id INTEGER DEFAULT NULL, order_provider INTEGER DEFAULT NULL, agency_sent VARCHAR(100) NOT NULL COLLATE BINARY, email_order_sent BOOLEAN DEFAULT NULL, tag VARCHAR(100) NOT NULL COLLATE BINARY, warehouse INTEGER DEFAULT NULL, "order" INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO order_drop_shipping (id, "order", provider_id, date_sync, state_order, expected_delivery_date_min, expected_delivery_date, date_delivery_planned_min, date_delivery_planned, article_id, order_provider, agency_sent, email_order_sent, tag, warehouse) SELECT id, "order", provider_id, date_sync, state_order, expected_delivery_date_min, expected_delivery_date, date_delivery_planned_min, date_delivery_planned, article_id, order_provider, agency_sent, email_order_sent, tag, warehouse FROM __temp__order_drop_shipping');
        $this->addSql('DROP TABLE __temp__order_drop_shipping');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__order_drop_shipping AS SELECT id, "order", provider_id, date_sync, state_order, expected_delivery_date_min, expected_delivery_date, date_delivery_planned_min, date_delivery_planned, article_id, order_provider, agency_sent, email_order_sent, tag, warehouse FROM order_drop_shipping');
        $this->addSql('DROP TABLE order_drop_shipping');
        $this->addSql('CREATE TABLE order_drop_shipping (id INTEGER NOT NULL, provider_id INTEGER DEFAULT NULL, date_sync DATE DEFAULT NULL, state_order VARCHAR(100) NOT NULL, expected_delivery_date_min DATE DEFAULT NULL, expected_delivery_date DATE DEFAULT NULL, date_delivery_planned_min DATE DEFAULT NULL, date_delivery_planned DATE DEFAULT NULL, article_id INTEGER DEFAULT NULL, order_provider INTEGER DEFAULT NULL, agency_sent VARCHAR(100) NOT NULL, email_order_sent BOOLEAN DEFAULT NULL, tag VARCHAR(100) NOT NULL, warehouse INTEGER DEFAULT NULL, "order" INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO order_drop_shipping (id, "order", provider_id, date_sync, state_order, expected_delivery_date_min, expected_delivery_date, date_delivery_planned_min, date_delivery_planned, article_id, order_provider, agency_sent, email_order_sent, tag, warehouse) SELECT id, "order", provider_id, date_sync, state_order, expected_delivery_date_min, expected_delivery_date, date_delivery_planned_min, date_delivery_planned, article_id, order_provider, agency_sent, email_order_sent, tag, warehouse FROM __temp__order_drop_shipping');
        $this->addSql('DROP TABLE __temp__order_drop_shipping');
    }
}
