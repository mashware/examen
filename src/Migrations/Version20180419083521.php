<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419083521 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE api_gama_blanca_proveedor (id INTEGER NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE drop_shipping_pedidos (id INTEGER NOT NULL, pedido BIGINT NOT NULL, id_proveedor INTEGER DEFAULT NULL, fecha_sincronizado DATETIME DEFAULT NULL, estado VARCHAR(50) DEFAULT NULL, fecha_envio_prevista_min DATETIME DEFAULT NULL, fecha_envio_prevista DATETIME DEFAULT NULL, fecha_entrega_prevista_min DATETIME DEFAULT NULL, fecha_entrega_prevista DATETIME DEFAULT NULL, id_articulo INTEGER DEFAULT NULL, agencia_enviada VARCHAR(50) DEFAULT NULL, email_pedido_enviado SMALLINT DEFAULT NULL, pedido_proveedor BIGINT NOT NULL, etiqueta VARCHAR(50) NOT NULL, almacen INTEGER NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE api_gama_blanca_proveedor');
        $this->addSql('DROP TABLE drop_shipping_pedidos');
    }
}
