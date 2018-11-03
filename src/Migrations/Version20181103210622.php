<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103210622 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingreso ADD sucursal_id INT DEFAULT NULL, ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingreso ADD CONSTRAINT FK_CC9B241F279A5D5E FOREIGN KEY (sucursal_id) REFERENCES sucursal (id)');
        $this->addSql('ALTER TABLE ingreso ADD CONSTRAINT FK_CC9B241FDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_CC9B241F279A5D5E ON ingreso (sucursal_id)');
        $this->addSql('CREATE INDEX IDX_CC9B241FDB38439E ON ingreso (usuario_id)');
        $this->addSql('ALTER TABLE pedido ADD sucursal_id INT DEFAULT NULL, ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CE279A5D5E FOREIGN KEY (sucursal_id) REFERENCES sucursal (id)');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CE279A5D5E ON pedido (sucursal_id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CEDB38439E ON pedido (usuario_id)');
        $this->addSql('ALTER TABLE usuario ADD sucursal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D279A5D5E FOREIGN KEY (sucursal_id) REFERENCES sucursal (id)');
        $this->addSql('CREATE INDEX IDX_2265B05D279A5D5E ON usuario (sucursal_id)');
        $this->addSql('ALTER TABLE venta ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE venta ADD CONSTRAINT FK_8FE7EE55DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_8FE7EE55DB38439E ON venta (usuario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingreso DROP FOREIGN KEY FK_CC9B241F279A5D5E');
        $this->addSql('ALTER TABLE ingreso DROP FOREIGN KEY FK_CC9B241FDB38439E');
        $this->addSql('DROP INDEX IDX_CC9B241F279A5D5E ON ingreso');
        $this->addSql('DROP INDEX IDX_CC9B241FDB38439E ON ingreso');
        $this->addSql('ALTER TABLE ingreso DROP sucursal_id, DROP usuario_id');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CE279A5D5E');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEDB38439E');
        $this->addSql('DROP INDEX IDX_C4EC16CE279A5D5E ON pedido');
        $this->addSql('DROP INDEX IDX_C4EC16CEDB38439E ON pedido');
        $this->addSql('ALTER TABLE pedido DROP sucursal_id, DROP usuario_id');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D279A5D5E');
        $this->addSql('DROP INDEX IDX_2265B05D279A5D5E ON usuario');
        $this->addSql('ALTER TABLE usuario DROP sucursal_id');
        $this->addSql('ALTER TABLE venta DROP FOREIGN KEY FK_8FE7EE55DB38439E');
        $this->addSql('DROP INDEX IDX_8FE7EE55DB38439E ON venta');
        $this->addSql('ALTER TABLE venta DROP usuario_id');
    }
}
