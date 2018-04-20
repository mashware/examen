<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419092705 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE api_gama_blancaproveedor (id INTEGER NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dropshipping (id INTEGER NOT NULL, pedido INTEGER NOT NULL, id_proveedor INTEGER NOT NULL, fecha_sincronizado DATETIME DEFAULT NULL, estado VARCHAR(100) DEFAULT NULL, fecha_envio_prevista_min DATETIME DEFAULT NULL, fecha_envio_prevista DATETIME DEFAULT NULL, fecha_entrega_prevista_min DATETIME DEFAULT NULL, fecha_entrega_prevista DATETIME DEFAULT NULL, id_articulo INTEGER DEFAULT NULL, pedido_proveedor INTEGER DEFAULT NULL, agencia_enviada VARCHAR(50) DEFAULT NULL, emai_pedido_enviado BOOLEAN DEFAULT NULL, etiqueta VARCHAR(50) DEFAULT NULL, almacen INTEGER DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE api_gama_blancaproveedor');
        $this->addSql('DROP TABLE dropshipping');
    }
}
