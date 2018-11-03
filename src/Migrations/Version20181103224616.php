<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103224616 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articulo DROP id_categoria, DROP id_unidad');
        $this->addSql('ALTER TABLE credito ADD venta_id INT DEFAULT NULL, DROP id_venta');
        $this->addSql('ALTER TABLE credito ADD CONSTRAINT FK_55168D31F2A5805D FOREIGN KEY (venta_id) REFERENCES venta (id)');
        $this->addSql('CREATE INDEX IDX_55168D31F2A5805D ON credito (venta_id)');
        $this->addSql('ALTER TABLE ingreso ADD persona_id INT DEFAULT NULL, DROP id_usuario, DROP id_sucursal, DROP id_proveedor');
        $this->addSql('ALTER TABLE ingreso ADD CONSTRAINT FK_CC9B241FF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('CREATE INDEX IDX_CC9B241FF5F88DB9 ON ingreso (persona_id)');
        $this->addSql('ALTER TABLE ingreso_detalle ADD articulo_id INT DEFAULT NULL, ADD ingreso_id INT DEFAULT NULL, DROP id_ingreso, DROP id_articulo');
        $this->addSql('ALTER TABLE ingreso_detalle ADD CONSTRAINT FK_315C401F2DBC2FC9 FOREIGN KEY (articulo_id) REFERENCES articulo (id)');
        $this->addSql('ALTER TABLE ingreso_detalle ADD CONSTRAINT FK_315C401FE70E8ADB FOREIGN KEY (ingreso_id) REFERENCES ingreso (id)');
        $this->addSql('CREATE INDEX IDX_315C401F2DBC2FC9 ON ingreso_detalle (articulo_id)');
        $this->addSql('CREATE INDEX IDX_315C401FE70E8ADB ON ingreso_detalle (ingreso_id)');
        $this->addSql('ALTER TABLE pedido ADD persona_id INT DEFAULT NULL, DROP id_cliente, DROP id_usuario, DROP id_sucursal');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CEF5F88DB9 ON pedido (persona_id)');
        $this->addSql('ALTER TABLE pedido_detalle ADD pedido_id INT DEFAULT NULL, ADD ingreso_detalle_id INT DEFAULT NULL, DROP id_pedido, DROP id_ingreso_detalle');
        $this->addSql('ALTER TABLE pedido_detalle ADD CONSTRAINT FK_E240F45E4854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('ALTER TABLE pedido_detalle ADD CONSTRAINT FK_E240F45EE39F7396 FOREIGN KEY (ingreso_detalle_id) REFERENCES ingreso_detalle (id)');
        $this->addSql('CREATE INDEX IDX_E240F45E4854653A ON pedido_detalle (pedido_id)');
        $this->addSql('CREATE INDEX IDX_E240F45EE39F7396 ON pedido_detalle (ingreso_detalle_id)');
        $this->addSql('ALTER TABLE usuario DROP id_sucursal, DROP id_empleado');
        $this->addSql('ALTER TABLE venta ADD pedido_id INT DEFAULT NULL, ADD credito_id INT DEFAULT NULL, DROP id_pedido, DROP id_usuario');
        $this->addSql('ALTER TABLE venta ADD CONSTRAINT FK_8FE7EE554854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('ALTER TABLE venta ADD CONSTRAINT FK_8FE7EE5539111995 FOREIGN KEY (credito_id) REFERENCES credito (id)');
        $this->addSql('CREATE INDEX IDX_8FE7EE554854653A ON venta (pedido_id)');
        $this->addSql('CREATE INDEX IDX_8FE7EE5539111995 ON venta (credito_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articulo ADD id_categoria INT NOT NULL, ADD id_unidad INT DEFAULT NULL');
        $this->addSql('ALTER TABLE credito DROP FOREIGN KEY FK_55168D31F2A5805D');
        $this->addSql('DROP INDEX IDX_55168D31F2A5805D ON credito');
        $this->addSql('ALTER TABLE credito ADD id_venta INT NOT NULL, DROP venta_id');
        $this->addSql('ALTER TABLE ingreso DROP FOREIGN KEY FK_CC9B241FF5F88DB9');
        $this->addSql('DROP INDEX IDX_CC9B241FF5F88DB9 ON ingreso');
        $this->addSql('ALTER TABLE ingreso ADD id_usuario INT NOT NULL, ADD id_sucursal INT NOT NULL, ADD id_proveedor INT NOT NULL, DROP persona_id');
        $this->addSql('ALTER TABLE ingreso_detalle DROP FOREIGN KEY FK_315C401F2DBC2FC9');
        $this->addSql('ALTER TABLE ingreso_detalle DROP FOREIGN KEY FK_315C401FE70E8ADB');
        $this->addSql('DROP INDEX IDX_315C401F2DBC2FC9 ON ingreso_detalle');
        $this->addSql('DROP INDEX IDX_315C401FE70E8ADB ON ingreso_detalle');
        $this->addSql('ALTER TABLE ingreso_detalle ADD id_ingreso INT NOT NULL, ADD id_articulo INT NOT NULL, DROP articulo_id, DROP ingreso_id');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEF5F88DB9');
        $this->addSql('DROP INDEX IDX_C4EC16CEF5F88DB9 ON pedido');
        $this->addSql('ALTER TABLE pedido ADD id_cliente INT NOT NULL, ADD id_usuario INT NOT NULL, ADD id_sucursal INT NOT NULL, DROP persona_id');
        $this->addSql('ALTER TABLE pedido_detalle DROP FOREIGN KEY FK_E240F45E4854653A');
        $this->addSql('ALTER TABLE pedido_detalle DROP FOREIGN KEY FK_E240F45EE39F7396');
        $this->addSql('DROP INDEX IDX_E240F45E4854653A ON pedido_detalle');
        $this->addSql('DROP INDEX IDX_E240F45EE39F7396 ON pedido_detalle');
        $this->addSql('ALTER TABLE pedido_detalle ADD id_pedido INT NOT NULL, ADD id_ingreso_detalle INT NOT NULL, DROP pedido_id, DROP ingreso_detalle_id');
        $this->addSql('ALTER TABLE usuario ADD id_sucursal INT NOT NULL, ADD id_empleado INT NOT NULL');
        $this->addSql('ALTER TABLE venta DROP FOREIGN KEY FK_8FE7EE554854653A');
        $this->addSql('ALTER TABLE venta DROP FOREIGN KEY FK_8FE7EE5539111995');
        $this->addSql('DROP INDEX IDX_8FE7EE554854653A ON venta');
        $this->addSql('DROP INDEX IDX_8FE7EE5539111995 ON venta');
        $this->addSql('ALTER TABLE venta ADD id_pedido INT NOT NULL, ADD id_usuario INT NOT NULL, DROP pedido_id, DROP credito_id');
    }
}
