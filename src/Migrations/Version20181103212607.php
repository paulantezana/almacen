<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103212607 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articulo ADD categoria_id INT DEFAULT NULL, ADD unidad_medida_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articulo ADD CONSTRAINT FK_69E94E913397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE articulo ADD CONSTRAINT FK_69E94E912E003F4 FOREIGN KEY (unidad_medida_id) REFERENCES unidad_medida (id)');
        $this->addSql('CREATE INDEX IDX_69E94E913397707A ON articulo (categoria_id)');
        $this->addSql('CREATE INDEX IDX_69E94E912E003F4 ON articulo (unidad_medida_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articulo DROP FOREIGN KEY FK_69E94E913397707A');
        $this->addSql('ALTER TABLE articulo DROP FOREIGN KEY FK_69E94E912E003F4');
        $this->addSql('DROP INDEX IDX_69E94E913397707A ON articulo');
        $this->addSql('DROP INDEX IDX_69E94E912E003F4 ON articulo');
        $this->addSql('ALTER TABLE articulo DROP categoria_id, DROP unidad_medida_id');
    }
}
