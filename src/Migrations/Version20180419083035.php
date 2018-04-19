<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419083035 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__order_entity AS SELECT id, pedido, id_proveedor, fecha_sincronizado, estado, fecha_envio_prevista_min, fecha_envio_prevista, fecha_entrega_prevista_min, fecha_entrega_prevista, id_articulo, pedido_proveedor, agencia_enviada, email_pedido_enviado, etiqueta, almacen FROM order_entity');
        $this->addSql('DROP TABLE order_entity');
        $this->addSql('CREATE TABLE order_entity (id INTEGER NOT NULL, pedido BIGINT NOT NULL, id_proveedor INTEGER DEFAULT NULL, estado VARCHAR(255) NOT NULL COLLATE BINARY, id_articulo INTEGER DEFAULT NULL, pedido_proveedor BIGINT DEFAULT NULL, agencia_enviada VARCHAR(50) DEFAULT NULL COLLATE BINARY, email_pedido_enviado SMALLINT DEFAULT NULL, etiqueta VARCHAR(50) DEFAULT NULL COLLATE BINARY, almacen INTEGER DEFAULT NULL, fecha_sincronizado VARCHAR(255) DEFAULT NULL, fecha_envio_prevista_min VARCHAR(255) DEFAULT NULL, fecha_envio_prevista VARCHAR(255) DEFAULT NULL, fecha_entrega_prevista_min VARCHAR(255) DEFAULT NULL, fecha_entrega_prevista VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO order_entity (id, pedido, id_proveedor, fecha_sincronizado, estado, fecha_envio_prevista_min, fecha_envio_prevista, fecha_entrega_prevista_min, fecha_entrega_prevista, id_articulo, pedido_proveedor, agencia_enviada, email_pedido_enviado, etiqueta, almacen) SELECT id, pedido, id_proveedor, fecha_sincronizado, estado, fecha_envio_prevista_min, fecha_envio_prevista, fecha_entrega_prevista_min, fecha_entrega_prevista, id_articulo, pedido_proveedor, agencia_enviada, email_pedido_enviado, etiqueta, almacen FROM __temp__order_entity');
        $this->addSql('DROP TABLE __temp__order_entity');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__order_entity AS SELECT id, pedido, id_proveedor, fecha_sincronizado, estado, fecha_envio_prevista_min, fecha_envio_prevista, fecha_entrega_prevista_min, fecha_entrega_prevista, id_articulo, pedido_proveedor, agencia_enviada, email_pedido_enviado, etiqueta, almacen FROM order_entity');
        $this->addSql('DROP TABLE order_entity');
        $this->addSql('CREATE TABLE order_entity (id INTEGER NOT NULL, pedido BIGINT NOT NULL, id_proveedor INTEGER DEFAULT NULL, estado VARCHAR(255) NOT NULL, id_articulo INTEGER DEFAULT NULL, pedido_proveedor BIGINT DEFAULT NULL, agencia_enviada VARCHAR(50) DEFAULT NULL, email_pedido_enviado SMALLINT DEFAULT NULL, etiqueta VARCHAR(50) DEFAULT NULL, almacen INTEGER DEFAULT NULL, fecha_sincronizado DATETIME DEFAULT NULL, fecha_envio_prevista_min DATETIME DEFAULT NULL, fecha_envio_prevista DATETIME DEFAULT NULL, fecha_entrega_prevista_min DATETIME DEFAULT NULL, fecha_entrega_prevista DATETIME DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO order_entity (id, pedido, id_proveedor, fecha_sincronizado, estado, fecha_envio_prevista_min, fecha_envio_prevista, fecha_entrega_prevista_min, fecha_entrega_prevista, id_articulo, pedido_proveedor, agencia_enviada, email_pedido_enviado, etiqueta, almacen) SELECT id, pedido, id_proveedor, fecha_sincronizado, estado, fecha_envio_prevista_min, fecha_envio_prevista, fecha_entrega_prevista_min, fecha_entrega_prevista, id_articulo, pedido_proveedor, agencia_enviada, email_pedido_enviado, etiqueta, almacen FROM __temp__order_entity');
        $this->addSql('DROP TABLE __temp__order_entity');
    }
}
