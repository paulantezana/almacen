<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103195827 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articulo (id INT AUTO_INCREMENT NOT NULL, id_categoria INT NOT NULL, id_unidad INT DEFAULT NULL, nombre VARCHAR(64) NOT NULL, descripcion LONGTEXT DEFAULT NULL, imagen VARCHAR(64) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(64) NOT NULL, estado TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE credito (id INT AUTO_INCREMENT NOT NULL, id_venta INT NOT NULL, fecha_pago DATETIME NOT NULL, total_pago NUMERIC(8, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empleado (id INT AUTO_INCREMENT NOT NULL, apellidos VARCHAR(64) NOT NULL, nombres VARCHAR(64) NOT NULL, tipo_documento VARCHAR(32) DEFAULT NULL, numero_documento VARCHAR(15) DEFAULT NULL, direccion VARCHAR(128) DEFAULT NULL, telefono VARCHAR(15) DEFAULT NULL, email VARCHAR(64) DEFAULT NULL, fecha_nacimiento DATETIME DEFAULT NULL, foto VARCHAR(64) DEFAULT NULL, login VARCHAR(32) DEFAULT NULL, clave VARCHAR(64) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE general (id INT AUTO_INCREMENT NOT NULL, empresa VARCHAR(128) NOT NULL, nombre_impuesto VARCHAR(12) DEFAULT NULL, porcentaje_impuesto NUMERIC(5, 2) DEFAULT NULL, simbolo_moneda VARCHAR(6) DEFAULT NULL, logo VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingreso (id INT AUTO_INCREMENT NOT NULL, id_usuario INT NOT NULL, id_sucursal INT NOT NULL, id_proveedor INT NOT NULL, tipo_comprobanate VARCHAR(32) NOT NULL, serie_comprobante VARCHAR(32) NOT NULL, num_comprobante VARCHAR(15) NOT NULL, fecha DATETIME DEFAULT NULL, impuesto NUMERIC(8, 2) DEFAULT NULL, total NUMERIC(8, 2) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingreso_detalle (id INT AUTO_INCREMENT NOT NULL, id_ingreso INT NOT NULL, id_articulo INT NOT NULL, codigo VARCHAR(64) NOT NULL, serie VARCHAR(64) DEFAULT NULL, descripcion LONGTEXT DEFAULT NULL, stock_ingreso INT DEFAULT NULL, stock_actual INT DEFAULT NULL, precio_compra NUMERIC(8, 2) DEFAULT NULL, precio_venta_distribuidor NUMERIC(8, 2) DEFAULT NULL, precio_venta_publico NUMERIC(8, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, id_cliente INT NOT NULL, id_usuario INT NOT NULL, id_sucursal INT NOT NULL, tipo_pedido VARCHAR(64) NOT NULL, fecha DATETIME DEFAULT NULL, estado TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido_detalle (id INT AUTO_INCREMENT NOT NULL, id_pedido INT NOT NULL, id_ingreso_detalle INT NOT NULL, cantidad INT NOT NULL, precio_venta NUMERIC(8, 2) NOT NULL, descuento NUMERIC(8, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, tipo_persona VARCHAR(32) NOT NULL, nombre VARCHAR(64) DEFAULT NULL, tipo_documento VARCHAR(32) DEFAULT NULL, num_documento VARCHAR(15) DEFAULT NULL, departamento VARCHAR(64) DEFAULT NULL, provincia VARCHAR(64) DEFAULT NULL, distrito VARCHAR(64) DEFAULT NULL, calle VARCHAR(64) DEFAULT NULL, telefono VARCHAR(15) DEFAULT NULL, email VARCHAR(64) DEFAULT NULL, numero_cuenta VARCHAR(32) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_documento (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(64) NOT NULL, operacion VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unidad_medida (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(32) NOT NULL, prefijo VARCHAR(15) NOT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, id_sucursal INT NOT NULL, id_empleado INT NOT NULL, perfil VARCHAR(32) NOT NULL, fecha_registro DATETIME NOT NULL, menu_almacen TINYINT(1) DEFAULT NULL, menu_compra TINYINT(1) DEFAULT NULL, menu_venta TINYINT(1) DEFAULT NULL, manu_mantenimiento TINYINT(1) DEFAULT NULL, menu_seguridad TINYINT(1) DEFAULT NULL, menu_consulta_compra TINYINT(1) DEFAULT NULL, menu_consulta_venta TINYINT(1) DEFAULT NULL, menu_admin TINYINT(1) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE venta (id INT AUTO_INCREMENT NOT NULL, id_pedido INT NOT NULL, id_usuario INT NOT NULL, tipo_venta VARCHAR(32) NOT NULL, tipo_comprobante VARCHAR(32) NOT NULL, serie_comprobante VARCHAR(15) DEFAULT NULL, num_comprobante VARCHAR(15) DEFAULT NULL, fecha DATETIME DEFAULT NULL, impuesto NUMERIC(8, 2) DEFAULT NULL, total NUMERIC(8, 2) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sucursal CHANGE direccion direccion VARCHAR(128) DEFAULT NULL, CHANGE telefono telefono VARCHAR(15) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE articulo');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE credito');
        $this->addSql('DROP TABLE empleado');
        $this->addSql('DROP TABLE general');
        $this->addSql('DROP TABLE ingreso');
        $this->addSql('DROP TABLE ingreso_detalle');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE pedido_detalle');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE tipo_documento');
        $this->addSql('DROP TABLE unidad_medida');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE venta');
        $this->addSql('ALTER TABLE sucursal CHANGE direccion direccion VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE telefono telefono VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
