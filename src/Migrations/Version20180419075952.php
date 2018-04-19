<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419075952 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE order_entity (id INTEGER NOT NULL, pedido BIGINT NOT NULL, id_proveedor INTEGER DEFAULT NULL, fecha_sincronizado DATETIME DEFAULT NULL, estado VARCHAR(255) NOT NULL, fecha_envio_prevista_min DATETIME DEFAULT NULL, fecha_envio_prevista DATETIME DEFAULT NULL, fecha_entrega_prevista_min DATETIME DEFAULT NULL, fecha_entrega_prevista DATETIME DEFAULT NULL, id_articulo INTEGER DEFAULT NULL, pedido_proveedor BIGINT DEFAULT NULL, agencia_enviada VARCHAR(50) DEFAULT NULL, email_pedido_enviado SMALLINT DEFAULT NULL, etiqueta VARCHAR(50) DEFAULT NULL, almacen INTEGER DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE order_entity');
    }
}
