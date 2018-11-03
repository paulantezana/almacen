<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103190351 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sucursal CHANGE razon_social razon_social VARCHAR(125) NOT NULL, CHANGE numero_documento numero_documento VARCHAR(15) DEFAULT NULL, CHANGE direccion direccion VARCHAR(100) DEFAULT NULL, CHANGE telefono telefono VARCHAR(10) DEFAULT NULL, CHANGE email email VARCHAR(64) DEFAULT NULL, CHANGE representante representante VARCHAR(128) DEFAULT NULL, CHANGE logo logo VARCHAR(64) DEFAULT NULL, CHANGE estado estado TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sucursal CHANGE razon_social razon_social VARCHAR(125) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE numero_documento numero_documento VARCHAR(15) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE direccion direccion VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telefono telefono VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE representante representante VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE logo logo VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE estado estado TINYINT(1) NOT NULL');
    }
}
