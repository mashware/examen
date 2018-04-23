<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419092256 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE dropshipping_pedidos (id INTEGER NOT NULL, pedido BIGINT NOT NULL, id_proveedor INTEGER NOT NULL, fecha_sincronizado DATETIME NOT NULL, estado VARCHAR(255) NOT NULL, fecha_envio_prevista_min DATETIME NOT NULL, fecha_envio_prevista DATETIME NOT NULL, fecha_entrega_prevista_min DATETIME NOT NULL, fecha_entrega_prevista DATETIME NOT NULL, id_articulo INTEGER NOT NULL, pedido_proveedor BIGINT NOT NULL, agencia_enviada VARCHAR(255) NOT NULL, email_pedido_enviado SMALLINT NOT NULL, etiqueta VARCHAR(255) NOT NULL, almacen INTEGER NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE dropshipping_pedidos');
    }
}
