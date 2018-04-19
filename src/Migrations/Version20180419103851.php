<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419103851 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, pedido INT DEFAULT NULL, id_proveedor INT DEFAULT NULL, fecha_sincronizada DATETIME DEFAULT NULL, fecha_envio_prevista_min DATETIME DEFAULT NULL, fecha_envio_prevista DATETIME DEFAULT NULL, fecha_entrega_prevista_min DATETIME DEFAULT NULL, fecha_entrega_prevista DATETIME DEFAULT NULL, pedido_proveedor INT DEFAULT NULL, agencia_enviada LONGTEXT DEFAULT NULL, id_articulo INT DEFAULT NULL, email_pedido_enviada TINYINT(1) DEFAULT NULL, almacen INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pedido');
    }
}
